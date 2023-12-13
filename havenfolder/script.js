const loadingBar = document.getElementById('loading-bar');
const randomText = document.getElementById('random-text');
const footer = document.querySelector('.footer');

const phrases = [
  "Establishing School Protection System",
  "Verifying Connection Security",
  "Validating Data Integrity",
  "Configuring Firewall Permissions",
  "Identifying Potential Weaknesses",
  "Initiating Security Protocol",
  "Accessing Protected School Servers",
  "Optimizing Program Code",
  "Activating System Control"
];

const totalTime = 5000;
const interval = 50;
const phraseInterval = 150;
const redirectDelay = 3000;
const backgroundVideo = document.getElementById('background-video');
backgroundVideo.playbackRate = 0.4;

let currentTime = 0;
let loadingInterval = setInterval(() => {
  currentTime += interval;
  const progress = (currentTime / totalTime) * 100;
  loadingBar.style.width = `${progress}%`;

  if (progress >= 100) {
    clearInterval(loadingInterval);
    clearInterval(phraseIntervalId);
    randomText.textContent = "Secured Connection";

    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    setTimeout(() => {
      if (isMobile) {
        window.location.href = "dashboard.php";
      } else {
        window.location.href = "dashboard.php";
      }
    }, redirectDelay);
  }
}, interval);

let currentPhraseIndex = 0;
let phraseIntervalId = setInterval(() => {
  if (loadingBar.style.width === "100%") {
    clearInterval(phraseIntervalId);
    randomText.textContent = "Loading complete!";
    return;
  }
  randomText.textContent = phrases[currentPhraseIndex];
  currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
}, phraseInterval);

const darkModeCheckbox = document.getElementById('dark-mode-checkbox');
const body = document.body;

darkModeCheckbox.addEventListener('change', () => {
  if (darkModeCheckbox.checked) {
    body.style.backgroundColor = '#333333';
    body.style.color = '#ffffff';
    randomText.style.color = '#000000';
    footer.style.color = '#ffffff';
  } else {
    body.style.backgroundColor = '#ffffff';
    body.style.color = '#000000';
    randomText.style.color = '#000000';
    footer.style.color = '#000000';
  }
});
