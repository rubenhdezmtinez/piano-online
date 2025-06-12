const keyMap = {
  'z': 'c3',
  's': 'c-3',
  'x': 'd3',
  'd': 'd-3',
  'c': 'e3',
  'v': 'f3',
  'g': 'f-3',
  'b': 'g3',
  'h': 'g-3',
  'n': 'a4',
  'j': 'a-4',
  'm': 'b4',
  
  'q': 'c4',
  '2': 'c-4',
  'w': 'd4',
  '3': 'd-4',
  'e': 'e4',
  'r': 'f4',
  '5': 'f-4',
  't': 'g4',
  '6': 'g-4',
  'y': 'a5',
  '7': 'a-5',
  'u': 'b5',
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
