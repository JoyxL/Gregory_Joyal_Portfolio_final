const player = new Plyr("video");
const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("nav-menu");

function toggleActiveClass() {
  navMenu.classList.toggle("active");
  hamburger.classList.toggle("active");
}

hamburger.addEventListener("click", toggleActiveClass);

// Select the HTML5 video
const mainVideo = document.querySelector("#main-video")
// set the pause button to display:none by default
document.querySelector(".fa-pause").style.display = "none"

// update the progress bar
mainVideo.addEventListener("timeupdate", () => {
    let currentProgress = (mainVideo.currentTime / mainVideo.duration) * 100
    if(mainVideo.ended){
        document.querySelector(".fa-play").style.display = "block"
        document.querySelector(".fa-pause").style.display = "none"
    }
    document.querySelector('.bar-inner').style.width = `${currentProgress}%`
})

// play or pause the video
const playVideo = (e) => {
    if(mainVideo.paused){
        document.querySelector(".fa-play").style.display = "none"
        document.querySelector(".fa-pause").style.display = "block"
        mainVideo.play()
    }
    else{
        document.querySelector(".fa-play").style.display = "block"
        document.querySelector(".fa-pause").style.display = "none"
        mainVideo.pause()
    }
}

// trigger fullscreen
const toggleFullScreen = (e) => {
    e.preventDefault()
    mainVideo.requestFullscreen()
}

// download the video
const downloadVideo = (e) => {
    e.preventDefault()
    let downloadLink = document.createElement('a')
    downloadLink.href = mainVideo.src
    downloadLink.target = "_blank"
    downloadLink.download = ""
    document.body.appendChild(downloadLink)
    downloadLink.click()
    document.body.removeChild(downloadLink)
}

// rewind the current time
const rewindVideo = (e) => {
    mainVideo.currentTime = mainVideo.currentTime - ((mainVideo.duration/100) * 5)
}

// forward the current time
const forwardVideo = (e) => {
    mainVideo.currentTime = mainVideo.currentTime + ((mainVideo.duration/100) * 5)
}


window.addEventListener('scroll', function() {
    const portfolioItems = document.querySelectorAll('.portfolio-item'); 
    
    portfolioItems.forEach(item => {
      const rect = item.getBoundingClientRect();
      
     
      if (rect.top < window.innerHeight && rect.bottom > 0) {
        item.classList.add('visible'); 
      }
    });
  });

 
document.addEventListener('DOMContentLoaded', () => {
  
  gsap.registerPlugin(ScrollTrigger);

 
  gsap.from(".about h1", {
    duration: 1, 
    y: -50, 
    opacity: 0, 
    ease: "bounce.out",
    scrollTrigger: {
      trigger: ".about_section", 
      start: "top bottom", 
      toggleActions: "play none none reverse", 
    }
  });

  
  gsap.from(".about_p", {
    duration: 1.5, 
    y: 100, 
    opacity: 0, 
    ease: "power3.out", 
    scrollTrigger: {
      trigger: ".about_section", 
      start: "top 80%", 
      end: "bottom 20%", 
      toggleActions: "play none none reverse", 
    }
  });
});
