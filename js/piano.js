const keyMap = {
    'a': 'C6',
    's': 'D6',
    'd': 'E6',
    'f': 'F6',
    'g': 'G6',
    'h': 'A6',
    'j': 'B6',
};

function playSound(note) {
  const audio = new Audio('/sounds/${note}.mp3');
  audio.play();
}

document.addEventListener('keydown', (event) => {
  const note = keyMap[event.key.toLowerCase()];
  if (note) {
    playSound(note);
  }
});
