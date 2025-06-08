const keyMap = {
  'a': 'C6',
  'w': 'C#6',
  's': 'D6',
  'e': 'D#6',
  'd': 'E6',
  'f': 'F6',
  't': 'F#6',
  'g': 'G6',
  'y': 'G#6',
  'h': 'A6',
  'u': 'A#6',
  'j': 'B6',
  'k': 'C7'
};

function playSound(note) {
  const audio = new Audio(`/sounds/${note}.mp3`);
  audio.play();
}

document.addEventListener('keydown', (event) => {
  const note = keyMap[event.key.toLowerCase()];
  if (note) {
    playSound(note);
  }
});
