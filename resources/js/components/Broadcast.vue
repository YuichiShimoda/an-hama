<template>
	<div ref="bottomBox" class="broadcast-content-box">
		<div class="progress-bar-box">
			<div v-for="(log, index) in viewedVideos" :key="log" :class="['each-bar-box', { 'is-active': log === currentVideo }]">
				<div class="inside-bar" :style="log === currentVideo ? { transform: `scaleX(${progressRatio})` } : {}"></div>
			</div>
		</div>
		<div class="close-btn" @click="closeVideo">
			<img class="icon" :src="'./image/movie/close.svg'" alt="閉じる">
		</div>
		<div class="volume-btn" @click="toggleVolume">
			<img v-if="volume" class="icon" :src="'./image/movie/volume-on.svg'" alt="音声ON">
			<img v-else class="icon" :src="'./image/movie/volume-off.svg'" alt="音声OFF">
		</div>
		<div class="play-btn" @click="playVideo">
			<div class="pause-btn">
				<img v-if="pause && !completed" class="icon" :src="'./image/movie/pause.svg'" alt="再生">
			</div>
		</div>
		<img v-if="!pause || !completed" class="logo-white" :src="'./image/mezamashi/logo-white.svg'" alt="ロゴ">
		<div v-if="completed" class="completed-btn">
			<img class="icon" :src="'./image/mezamashi/completed.svg'" alt="リピート">
		</div>
		<video ref="videoPlayer" class="play-movie"></video>
	</div>
</template>

<script setup>
	import { ref, computed, onMounted, onBeforeUnmount, watch } from 'vue'
	import videojs from 'video.js';
	import axios from 'axios';
	import '../../css/broadcast.css';

	const props = defineProps({
		initialQueryValue: String,
		onClose: Function
	})

	const videoPlayer = ref(null)
	const player = ref(null)
	const volume = ref(1)
	const pause = ref(0)
	const completed = ref(0)

	const currentVideo = 'broadcast';
	const viewedVideos = ref([]);
	const progressRatio = ref(0);
	viewedVideos.value.push(currentVideo.value);

	const videoOptions = ref([]);
	const videoOrderMap = ref({});

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
	function pushGTMEventConversion(videoId, videoTitle, cvType) {
		if (typeof window.dataLayer !== 'undefined') {
			window.dataLayer.push({
				'event': 'video_cv',
				'video_title': videoTitle,
				'video_id': videoId
			});
			if (cvType == 'tel') {
				window.dataLayer.push({
					'event': 'google_ads_video_tel_cv',
					'video_title': videoTitle,
					'video_id': videoId
				});
			}
		}
	}

	onMounted(async () => {
		player.value = videojs(videoPlayer.value, {
			autoplay: true,
			loop: false,
			controls: true,
			muted: true,
			playsinline: true,
			preload: 'auto',
			poster: './image/mezamashi/screenshot.webp',
			sources: [
				{
					src: `./movie/top/mezamashi/broadcast.mp4`,
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
		})
		player.value.on('pause', () => {
			completed.value = 0;
			pause.value = 1
		})
		player.value.on('ended', () => {
			completed.value = 1;
			const videoId = currentVideo.value;
			const videoInfo = videoOptions.value.find(v => v.key === videoId);
			const videoTitle = videoInfo ? videoInfo.label : videoId;
			pushGTMEventComplete(videoId, videoTitle);
		});

		player.value.on('timeupdate', () => {
			const currentTime = player.value.currentTime();
			const videoId = currentVideo.value;
			if (currentTime >= 2 && !gtmEventSent.value[videoId]) {
				const videoInfo = videoOptions.value.find(v => v.key === videoId);
				const videoTitle = videoInfo ? videoInfo.label : videoId;
				pushGTMEventStart(videoId, videoTitle);
				gtmEventSent.value[videoId] = true;
			}
		});
		updateProgress();
		// if (window.innerWidth <= 500 && bottomBox.value) {
		// 	bottomBox.value.addEventListener('touchstart', handleTouchStart);
		// 	bottomBox.value.addEventListener('touchmove', handleTouchMove);
		// 	bottomBox.value.addEventListener('touchend', handleTouchEnd);
		// }
	})

	onBeforeUnmount(() => {
		if (player.value) {
			player.value.dispose()
		}
		// if (window.innerWidth <= 500 && bottomBox.value) {
		// 	bottomBox.value.removeEventListener('touchstart', handleTouchStart);
		// 	bottomBox.value.removeEventListener('touchmove', handleTouchMove);
		// 	bottomBox.value.removeEventListener('touchend', handleTouchEnd);
		// }
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
		$("#broadcast").toggleClass("is-show");
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
</script>
