import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const echo = new Echo({
  broadcaster: 'pusher',
  key: 'e9928ec775500fbb7e4a',
  cluster: 'mt1',
  forceTLS: true,
});

export default echo;
