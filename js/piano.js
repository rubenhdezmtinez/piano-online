const keyMap = {
  'a': 'c4',
  'w': 'c-4',
  's': 'd4',
  'e': 'd-4',
  'd': 'e4',
  'f': 'f4',
  't': 'f-4',
  'g': 'g4',
  'y': 'g-4',
  'h': 'a4',
  'u': 'a-4',
  'j': 'b4',

  'k': 'c5',
  'o': 'c-5',
  'l': 'd5',
  'p': 'd-5',
  'ñ': 'e5',
};

function playSound(note) {
  const audio = new Audio(`/sounds/${note}.mp3`);
  audio.currentTime = 0;
  audio.play().catch(err => console.warn('No se pudo reproducir:', err));
}

document.addEventListener('keydown', (event) => {
  const note = keyMap[event.key.toLowerCase()];
  if (note) {
    playSound(note);
  }
});
