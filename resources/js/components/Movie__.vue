<template>
	<div ref="bottomBox" class="movie-content-box">
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
		<div v-if="completed" class="completed-btn">
			<img class="icon" :src="'./image/movie/completed.svg'" alt="リピート">
		</div>
		<video ref="videoPlayer" class="play-movie"></video>
		<div v-if="!completed" class="bottom-box">
			<button v-for="video in nextVideos" :key="video.key" class="movie-btn next-btn is-play" @click="changeVideo" :data-src="video.key">
				<p>
					<span v-for="(char, index) in splitChars(video.label)" :key="index">{{ char }}</span>
				</p>
			</button>
<!-- 			<button v-if="currentVideo !== 'new-year'" class="next-btn is-play" @click="changeVideo" :data-src="'new-year'">
				<p><span>新</span><span>年</span><span>の</span><span>ご</span><span>挨</span><span>拶</span></p>
			</button>
			<button v-if="currentVideo !== 'season1-2'" class="next-btn is-play" @click="changeVideo" :data-src="'season1-2'">
				<p><span>季</span><span>節</span><span>の</span><span>つ</span><span>け</span><span>か</span><span>け</span><span>パ</span><span>ス</span><span>タ</span></p>
			</button>
			<button v-if="currentVideo !== 'dinner-time202601'" class="next-btn is-play" @click="changeVideo" :data-src="'dinner-time202601'">
				<p><span>デ</span><span>ィ</span><span>ナ</span><span>ー</span><span>タ</span><span>イ</span><span>ム</span><span>特</span><span>別</span><span>営</span><span>業</span></p>
			</button> -->
		</div>
		<div v-if="completed" class="bottom-box">
			<button v-for="video in nextVideos" :key="video.key" class="movie-btn next-btn" @click="changeVideo" :data-src="video.key">
				<p>
					<span v-for="(char, index) in splitChars(video.label)" :key="index">{{ char }}</span>
				</p>
			</button>
<!-- 			<button v-if="currentVideo !== 'new-year'" class="next-btn four-links" @click="changeVideo" :data-src="'new-year'">
				<p><span>新</span><span>年</span><span>の</span><span>ご</span><span>挨</span><span>拶</span></p>
			</button>
			<button v-if="currentVideo !== 'season1-2'" class="next-btn four-links" @click="changeVideo" :data-src="'season1-2'">
				<p><span>季</span><span>節</span><span>の</span><span>つ</span><span>け</span><span>か</span><span>け</span><span>パ</span><span>ス</span><span>タ</span></p>
			</button>
			<button v-if="currentVideo !== 'dinner-time202601'" class="next-btn four-links" @click="changeVideo" :data-src="'dinner-time202601'">
				<p><span>デ</span><span>ィ</span><span>ナ</span><span>ー</span><span>タ</span><span>イ</span><span>ム</span><span>特</span><span>別</span><span>営</span><span>業</span></p>
			</button> -->
			<a class="movie-btn link-btn" href="./menu">
				<p><span>あ</span><span>ん</span><span>か</span><span>け</span><span>パ</span><span>ス</span><span>タ</span></p>
			</a>
			<a class="movie-btn link-btn" href="./menu/pizza">
				<p><span>あ</span><span>ん</span><span>か</span><span>け</span><span>ピ</span><span>ザ</span></p>
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

	const currentVideo = ref(props.initialQueryValue || 'dinner-time202601');
	const viewedVideos = ref([]);
	const progressRatio = ref(0);
	viewedVideos.value.push(currentVideo.value);
	// viewedVideos.value.push("season1-2");// to show two bar
	// viewedVideos.value.push("dinner-time202601");// to show two bar

	const videoOptions = ref([]);
	const videoOrderMap = ref({});

	const nextVideos = computed(() => {
		const order = videoOrderMap.value[currentVideo.value];
		if (!order) return [];
			return order
				.map(key => videoOptions.value.find(v => v.key === key))
				.filter(Boolean);
	});
	function splitChars(text) {
		return [...text]
	}

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

	async function getMovie() {
		try {
			const response = await axios.get('/api/movies');
			const moviesData = response.data;
			videoOptions.value = moviesData.map(movie => ({
				key: movie.filename,
				label: movie.title
			}));
			const newOrderMap = {};
			moviesData.forEach(movie => {
				if (movie.filename && movie.next_movie) {
					newOrderMap[movie.filename] = movie.next_movie;
				}
			});
			videoOrderMap.value = newOrderMap;
		} catch (error) {
			console.error('動画データの取得エラー:', error);
		}
	}


	onMounted(async () => {
		await getMovie();
		player.value = videojs(videoPlayer.value, {
			autoplay: true,
			loop: false,
			controls: true,
			muted: true,
			playsinline: true,
			preload: 'auto',
			poster: './image/movie/poster.webp',
			sources: [
				{
					src: `./movie/${props.initialQueryValue}.mp4`,
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
				src: `./movie/${fileName}.mp4`,
				type: 'video/mp4'
			})
			player.value.muted(false);
			volume.value = 1
			player.value.play()
		}
	}
	function handleConversionClick(event) {
		const videoId = currentVideo.value;
		const videoInfo = videoOptions.value.find(v => v.key === videoId);
		const videoTitle = videoInfo ? videoInfo.label : videoId;

		const targetElement = event.currentTarget;
		const href = targetElement.href;
		const cvType = targetElement.dataset.cvType;

		pushGTMEventConversion(videoId, videoTitle, cvType);

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
