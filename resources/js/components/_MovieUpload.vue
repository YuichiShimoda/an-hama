<template>
	<div ref="bottomBox" class="movie-content-box">
		<div class="progress-bar-box">
			<div v-for="(log, index) in viewedVideos" :key="log" :class="['each-bar-box', { 'is-active': log === currentVideo }]">
				<div class="inside-bar" :style="log === currentVideo ? { transform: `scaleX(${progressRatio})` } : {}"></div>
			</div>
		</div>
		<div class="close-btn" @click="closeVideo">
			<img class="icon" :src="'./image/lp/movie/close.svg'" alt="閉じる">
		</div>
		<div class="volume-btn" @click="toggleVolume">
			<img v-if="volume" class="icon" :src="'./image/lp/movie/volume-on.svg'" alt="音声ON">
			<img v-else class="icon" :src="'./image/lp/movie/volume-off.svg'" alt="音声OFF">
		</div>
		<div class="play-btn" @click="playVideo">
			<div class="pause-btn">
				<img v-if="pause && !completed" class="icon" :src="'./image/lp/movie/pause.svg'" alt="再生">
			</div>
		</div>
		<div v-if="completed" class="completed-btn">
			<img class="icon" :src="'./image/lp/movie/completed.svg'" alt="リピート">
		</div>
		<div class="up-btn" @click="showButton">
			<img class="icon" :src="'./image/lp/movie/up.svg'" alt="矢印">
		</div>
		<video ref="videoPlayer" class="play-movie"></video>
		<div class="bottom-box">
			<button v-for="video in nextVideos" :key="video.key" class="next-btn" @click="changeVideo" :data-src="video.key">
				<span>{{ video.label }}</span>
			</button>
			<a v-if="currentVideo !== 'rakuraku'" class="call-btn" href="tel:0120979986" :data-video-key="currentVideo" @click.prevent="handleConversionClick($event)">
				<img class="tel-icon" :src="'./image/lp/movie/tel-icon.svg'" alt="電話">
				<img class="num" :src="'./image/lp/movie/tel-num.svg'" alt="0120-979-986">
			</a>
			<a v-else class="call-btn" href="./up" :data-video-key="currentVideo" target="_blank" rel="noopener noreferrer" @click.prevent="handleConversionClick($event)">
				<img class="phone-icon" :src="'./image/lp/movie/phone-icon.svg'" alt="スマホ">
				<img class="num" :src="'./image/lp/movie/rakuraku-white.svg'" alt="0120-979-986">
			</a>
		</div>
	</div>
</template>

<script setup>
	import { ref, computed, onMounted, onBeforeUnmount, watch } from 'vue'
	import videojs from 'video.js';
	import axios from 'axios';
	import '../../css/upload.css';

	const props = defineProps({
		initialQueryValue: String,
		onClose: Function
	})

	const videoPlayer = ref(null)
	const player = ref(null)
	const volume = ref(1)
	const pause = ref(0)
	const completed = ref(0)

	const currentVideo = ref(props.initialQueryValue || 'service');
	const viewedVideos = ref([]);
	const progressRatio = ref(0);
	viewedVideos.value.push(currentVideo.value);

	const videoOptions = [
		{ key: 'service', label: 'サービス紹介' },
		{ key: 'rakuraku', label: 'ラクラク査定' },
		{ key: 'ceo', label: '代表者メッセージ' },
		{ key: 'campaign', label: 'キャンペーン情報' }
	];

	const videoOrderMap = {
		service:     ['rakuraku', 'ceo', 'campaign'],
		rakuraku:    ['campaign', 'service', 'ceo'],
		ceo:         ['service', 'campaign', 'rakuraku'],
		campaign:    ['rakuraku', 'ceo', 'service']
	};

	const nextVideos = computed(() => {
		const order = videoOrderMap[currentVideo.value];
		return order
			.map(key => videoOptions.find(v => v.key === key))
			.filter(Boolean);
	});

	const bottomBox = ref(null)
	let startY = 0;
	let isDragging = false;

	const gtmEventSent = ref({});

	function handleTouchStart(e) {
		if (e.touches.length !== 1) return;
		startY = e.touches[0].clientY;
		isDragging = true;
	}
	function handleTouchMove(e) {
		if (!isDragging) return;
		const deltaY = e.touches[0].clientY - startY;
		if (deltaY > 50 && bottomBox.value) {
			bottomBox.value.classList.add('hidden');
			isDragging = false;
		}
	}
	function handleTouchEnd() {
		isDragging = false;
	}

	function pushGTMEventStart(videoId, videoTitle) {
		if (typeof window.dataLayer !== 'undefined') {
			window.dataLayer.push({
				'event': 'video_start',
				'video_title': videoTitle,
				'video_id': videoId
			});
		}
	}
	function pushGTMEventComplete(videoId, videoTitle) {
		if (typeof window.dataLayer !== 'undefined') {
			window.dataLayer.push({
				'event': 'video_complete',
				'video_title': videoTitle,
				'video_id': videoId
			});
		}
	}
	function pushGTMEventConversion(videoId, videoTitle) {
		if (typeof window.dataLayer !== 'undefined') {
			window.dataLayer.push({
				'event': 'video_cv',
				'video_title': videoTitle,
				'video_id': videoId
			});
		}
	}


	onMounted(() => {
		player.value = videojs(videoPlayer.value, {
			autoplay: true,
			loop: false,
			controls: true,
			muted: true,
			playsinline: true,
			preload: 'auto',
			poster: './image/lp/movie/poster.webp',
			sources: [
				{
					src: `./movie/lp/${props.initialQueryValue}.mp4`,
					type: 'video/mp4'
				}
			]
		})

		gtmEventSent.value[currentVideo.value] = false;

		player.value.on('play', () => {
			completed.value = 0;
			pause.value = 0
			if (player.value.muted()) {
				player.value.muted(false);
				volume.value = 1;
			}
			if (player.value.currentTime() < 2) {
				$("#movie .call-btn").removeClass("is-end");
				gtmEventSent.value[currentVideo.value] = false;
			}
		})
		player.value.on('pause', () => {
			completed.value = 0;
			pause.value = 1
		})
		player.value.on('ended', () => {
			$("#movie .call-btn").addClass("is-end");
			completed.value = 1;
			const videoId = currentVideo.value;
			const videoInfo = videoOptions.find(v => v.key === videoId);
			const videoTitle = videoInfo ? videoInfo.label : videoId;
			pushGTMEventComplete(videoId, videoTitle);
		});

		player.value.on('timeupdate', () => {
			const currentTime = player.value.currentTime();
			const videoId = currentVideo.value;
			if (currentTime >= 2 && !gtmEventSent.value[videoId]) {
				const videoInfo = videoOptions.find(v => v.key === videoId);
				const videoTitle = videoInfo ? videoInfo.label : videoId;
				pushGTMEventStart(videoId, videoTitle);
				gtmEventSent.value[videoId] = true;
			}
		});
		updateProgress();
		if (window.innerWidth <= 500 && bottomBox.value) {
			bottomBox.value.addEventListener('touchstart', handleTouchStart);
			bottomBox.value.addEventListener('touchmove', handleTouchMove);
			bottomBox.value.addEventListener('touchend', handleTouchEnd);
		}
	})

	onBeforeUnmount(() => {
		if (player.value) {
			player.value.dispose()
		}
		if (window.innerWidth <= 500 && bottomBox.value) {
			bottomBox.value.removeEventListener('touchstart', handleTouchStart);
			bottomBox.value.removeEventListener('touchmove', handleTouchMove);
			bottomBox.value.removeEventListener('touchend', handleTouchEnd);
		}
	})

	watch(currentVideo, (newVideo) => {
		if (!viewedVideos.value.includes(newVideo)) {
			viewedVideos.value.push(newVideo);
		}
	});

	function updateProgress() {
		if (player.value) {
			const current = player.value.currentTime();
			const duration = player.value.duration();
			progressRatio.value = duration ? current / duration : 0;
		}
		requestAnimationFrame(updateProgress);
	}

	function closeVideo() {
		$("#appeal .thum").get(0).play();
		$("#movie").toggleClass("is-show");
		$("#appeal").toggleClass("is-show");
		$("#wrap").toggleClass("no-scroll");
		props.onClose?.()
	}
	function toggleVolume() {
		volume.value = volume.value ? 0 : 1
		if (player.value) {
			player.value.muted(!volume.value)
		}
	}
	function playVideo() {
		if (!player.value) return
		if (player.value.paused()) {
			completed.value = 0;
			player.value.play()
		} else {
			completed.value = 0;
			player.value.pause()
		}
	}
	function showButton() {
		if (player.value) {
			$(".movie-content-box").removeClass("hidden");
		}
	}
	function changeVideo(event) {
		const fileName = event.currentTarget.dataset.src;
		if (!fileName) return;
		gtmEventSent.value[fileName] = false
		currentVideo.value = fileName;
		if (player.value && fileName) {
			player.value.src({
				src: `./movie/lp/${fileName}.mp4`,
				type: 'video/mp4'
			})
			player.value.muted(false);
			volume.value = 1
			player.value.play()
		}
	}
	function handleConversionClick(event) {
		const videoId = currentVideo.value;
		const videoInfo = videoOptions.find(v => v.key === videoId);
		const videoTitle = videoInfo ? videoInfo.label : videoId;

		pushGTMEventConversion(videoId, videoTitle);

		const targetElement = event.currentTarget;
		const href = targetElement.href;
		const isMobile = /iPhone|Android/i.test(navigator.userAgent);

		if (videoId === 'rakuraku') {
			setTimeout(() => {
				window.open(href, targetElement.target || '_self', targetElement.rel);
			}, 300);
		} else if (isMobile) {
			window.location.href = href;
		}
	}
</script>
