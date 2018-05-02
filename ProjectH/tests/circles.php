<html>
<style>
@keyframes circle {
	from {
		transform: scale(0)
	}
	to {
		transform: scale(6)
	}
}
.circle {
  margin: 0 auto;
  width: 300px;
  height: 300px;
  border: 20px solid CadetBlue;
  border-radius: 50%;
  position: absolute;
  top: 5%;
  left: 40%;
}
.one {
  animation: circle 4s infinite linear;
}
.two {
  animation: circle 3s infinite linear;
}
.three {
  animation: circle 2s infinite linear;
}
</style>

<body>
<div class="circle one"></div>
<div class="circle two"></div>
<div class="circle three"></div>
</body>
</html>