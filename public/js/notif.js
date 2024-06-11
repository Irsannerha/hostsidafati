// Notification container
const notification = document.querySelector('.notification');
let perhatianCount = 0;
let selamatDatangShown = false;

// Function called when the button to dismiss the message is clicked
function dismissMessage() {
  // Remove the .received class from the .notification widget
  notification.classList.remove('received');

  // Call the generateMessage function to show another message after a brief delay
  if (perhatianCount < 3) {
    setTimeout(generateMessage, 10000); // 10 seconds delay before showing the next 'PERHATIAN' message
  }
}

// Function showing the message
function showMessage(duration) {
  // Add a class of .received to the .notification container
  notification.classList.add('received');

  // Attach an event listener on the button to dismiss the message
  // Include the once flag to have the button register the click only one time
  const button = document.querySelector('.notification__message button');
  button.addEventListener('click', dismissMessage, { once: true });

  // Automatically dismiss the message after the specified duration
  setTimeout(() => {
    dismissMessage();
  }, duration);
}

// Function generating a message with predefined title and text from the HTML
function generateMessage() {
  const message = document.querySelector('.notification__message');
  let title, text, displayDuration;

  if (!selamatDatangShown) {
    // Use the existing 'SELAMAT DATANG' message in the HTML
    title = message.querySelector('h1').textContent;
    text = message.querySelector('p').textContent;
    displayDuration = 5000; // 5 seconds
    selamatDatangShown = true;
  } else if (perhatianCount < 3) {
    // Change to 'PERHATIAN' message
    title = 'PERHATIAN!';
    text = 'Harap Membaca Panduan yang Ada di Bawah Kolom! Mohon Isi Data dengan Benar dan Lengkap ya, serta Dicek Kembali Sebelum Mengirimkan Data. Terimakasih.';
    displayDuration = 10000; // 10 seconds
    perhatianCount++;
  } else {
    // If all messages have been shown, do nothing
    return;
  }

  // Update the notification message
  message.querySelector('h1').textContent = title;
  message.querySelector('p').textContent = text;

  // Update the class of the notification message to apply the correct styles
  const notificationClass = `message--${title.replace('!', '').replace(' ', '').toUpperCase()}`;
  message.className = `notification__message ${notificationClass}`;

  showMessage(displayDuration);

  // Set the delay for the next 'PERHATIAN' message
  if (title === 'PERHATIAN!' && perhatianCount < 3) {
    setTimeout(generateMessage, displayDuration + 10000); // 10 seconds delay before showing the next 'PERHATIAN' message
  }

  // Fetch and log the text from the notification
  setTimeout(() => {
    const notificationText = getTextFromNotification();
    console.log(notificationText);
  }, 1000); // Tunggu 1 detik untuk memastikan elemen notifikasi sudah muncul
}

// Function to get the text from the notification
function getTextFromNotification() {
  // Mendapatkan elemen notifikasi
  const notificationMessage = document.querySelector('.notification__message');
  
  // Mendapatkan teks dari elemen h1 dan p di dalam notifikasi
  const title = notificationMessage.querySelector('h1').textContent;
  const message = notificationMessage.querySelector('p').textContent;
  
  // Mengembalikan teks dalam format objek
  return {
    title: title,
    message: message
  };
}

// Initial delay before the first message
setTimeout(generateMessage, 1000); // 1 second delay before starting the first message
