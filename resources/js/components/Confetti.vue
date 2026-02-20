<template>
	<div ref="confettiBox" class="confetti-content-box">
		<h1>あんかけハマ</h1>
	</div>
</template>

<script setup>
	import { ref, onMounted, onBeforeUnmount } from "vue"
	import * as THREE from "three"
	import { OrbitControls } from "three/examples/jsm/controls/OrbitControls.js"

	const confettiBox = ref(null)

	// settings
	const timeStep = 1 / 60
	const confettiCount = 20//150000

	let camera, scene, renderer, controls
	let shaderUniforms, confettiMaterial
	let time = 0
	let animationId

	onMounted(() => {
		console.log("mount check");
		init()
		tick()
		window.addEventListener("resize", onWindowResize)
	})

	onBeforeUnmount(() => {
		cancelAnimationFrame(animationId)
		window.removeEventListener("resize", onWindowResize)
		renderer?.dispose()
	})

	function init() {
		createScene()
		createControls()
		createConfettiMaterial()
		createConfettiParticles()
	}

	function createScene() {
		scene = new THREE.Scene()

		camera = new THREE.PerspectiveCamera(
			70,
			window.innerWidth / window.innerHeight,
			0.1,
			2000
		)
		camera.position.set(3.24, 0.99, -3.21)

		renderer = new THREE.WebGLRenderer({ alpha: false })
		renderer.setSize(window.innerWidth, window.innerHeight)
		renderer.setClearColor(0xffffff, 0)

		confettiBox.value.appendChild(renderer.domElement)
	}

	function createControls() {
		controls = new OrbitControls(camera, renderer.domElement)
	}

	function createConfettiMaterial() {
		shaderUniforms = {
			uTime: { value: 0 },
		}
		console.log("Shader1 check");
		confettiMaterial = new THREE.ShaderMaterial({
			uniforms: shaderUniforms,
			vertexShader: vertexShader,
			fragmentShader: fragmentShader,
			side: THREE.DoubleSide,
		})
		console.log("Shader2 check");
	}

	function createConfettiParticles() {
		const triangles = confettiCount * 2
		const geometry = new THREE.BufferGeometry()

		const positions = new Float32Array(triangles * 3 * 3)
		const translations = new Float32Array(triangles * 3 * 3)
		const animation = new Float32Array(triangles * 3 * 2)
		const axisAngles = new Float32Array(triangles * 3 * 4)
		const frontColors = new Float32Array(triangles * 3 * 3)
		const backColors = new Float32Array(triangles * 3 * 3)

		geometry.setAttribute("position", new THREE.BufferAttribute(positions, 3))
		geometry.setAttribute("aTranslation", new THREE.BufferAttribute(translations, 3))
		geometry.setAttribute("aAnimation", new THREE.BufferAttribute(animation, 2))
		geometry.setAttribute("aAxisAngle", new THREE.BufferAttribute(axisAngles, 4))
		geometry.setAttribute("aFrontColor", new THREE.BufferAttribute(frontColors, 3))
		geometry.setAttribute("aBackColor", new THREE.BufferAttribute(backColors, 3))

		for (let i = 0; i < positions.length; i++) {
			positions[i] = (Math.random() - 0.5) * 0.1
			translations[i] = (Math.random() - 0.5) * 10
		}

		for (let i = 0; i < animation.length; i += 2) {
			animation[i] = Math.random() * 2
			animation[i + 1] = 5 + Math.random() * 5
		}

		for (let i = 0; i < axisAngles.length; i += 4) {
			axisAngles[i] = Math.random()
			axisAngles[i + 1] = Math.random()
			axisAngles[i + 2] = Math.random()
			axisAngles[i + 3] = Math.random() * Math.PI
		}

		const front = new THREE.Color()
		const back = new THREE.Color()

		for (let i = 0; i < frontColors.length; i += 3) {
			const hue = Math.random()
			front.setHSL(hue, 1.0, 0.5)
			back.setHSL(hue, 0.6, 0.4)

			frontColors[i] = front.r
			frontColors[i + 1] = front.g
			frontColors[i + 2] = front.b

			backColors[i] = back.r
			backColors[i + 1] = back.g
			backColors[i + 2] = back.b
		}

		const mesh = new THREE.Mesh(geometry, confettiMaterial)
		scene.add(mesh)
	}

	function tick() {
		animationId = requestAnimationFrame(tick)
		if (time < 8) {
			update()
			render()
		}
	}

	function update() {
		shaderUniforms.uTime.value = time
		time += timeStep
		time %= 8
		// controls.update()
	}

	function render() {
		renderer.render(scene, camera)
	}

	function onWindowResize() {
		camera.aspect = window.innerWidth / window.innerHeight
		camera.updateProjectionMatrix()
		renderer.setSize(window.innerWidth, window.innerHeight)
	}

	const vertexShader = `
		attribute vec2 aAnimation;
		attribute vec3 aTranslation;
		attribute vec4 aAxisAngle;
		attribute vec3 aFrontColor;
		attribute vec3 aBackColor;

		uniform float uTime;

		varying vec3 vFrontColor;
		varying vec3 vBackColor;

		vec3 rotateVector(vec4 q, vec3 v){
			return v + 2.0 * cross(q.xyz, cross(q.xyz, v) + q.w * v);
		}

		vec4 quatFromAxisAngle(vec3 axis, float angle){
			float halfAngle = angle * 0.5;
			return vec4(axis.xyz * sin(halfAngle), cos(halfAngle));
		}

		void main(){
			float tDelay = aAnimation.x;
			float tDuration = aAnimation.y;
			float tTime = clamp(uTime - tDelay, 0.0, tDuration);
			float tProgress = tTime / tDuration;

			vec3 pos = position;
			vec4 quat = quatFromAxisAngle(aAxisAngle.xyz, aAxisAngle.w * tProgress);
			pos = rotateVector(quat, pos);
			pos += aTranslation * tProgress;

			vFrontColor = aFrontColor;
			vBackColor = aBackColor;

			gl_Position = projectionMatrix * modelViewMatrix * vec4(pos, 1.0);
		}
	`

	const fragmentShader = `
		varying vec3 vFrontColor;
		varying vec3 vBackColor;

		void main(){
			if(gl_FrontFacing){
				gl_FragColor = vec4(vFrontColor, 1.0);
			}else{
				gl_FragColor = vec4(vBackColor, 1.0);
			}
		}
	`
</script>

<style>
	.confetti-content-box {
		width: 100vw;
		height: 100vh;
		position: relative;
		overflow: hidden;
	}
	.confetti-content-box h1 {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		font-size: 40px;
	}
</style>