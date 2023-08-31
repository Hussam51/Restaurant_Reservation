require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// import Echo from 'laravel-echo'

// window.Echo = new Echo({
//   broadcaster: 'pusher',
//   key: '6049f9b053c1a58f73a5',
//   cluster: 'mt1',
//   forceTLS: true
// });

// var channel = Echo.private(`App.Models.User.${userId}`);
// channel.notification(function(data) {
//  console.log(data.userName)
// });
