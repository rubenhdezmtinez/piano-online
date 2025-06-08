const keyMap = {
  'z': 'c4',
  's': 'c-4',
  'x': 'd4',
  'd': 'd-4',
  'c': 'e4',
  'v': 'f4',
  'g': 'f-4',
  'b': 'g4',
  'h': 'g-4',
  'n': 'a5',
  'j': 'a-5',
  'm': 'b5',

  'q': 'c5',
  '2': 'c-5',
  'w': 'd5',
  '3': 'd-5',
  'e': 'e5',
  'r': 'f5',
  '5': 'f-5',
  't': 'g5',
  '6': 'g-5',
  'y': 'a6',
  '7': 'a-6',
  'u': 'b6',
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
