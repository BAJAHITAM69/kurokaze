// Set the countdown date: 50 days, 17 hours, 15 minutes, and 30 seconds from now
const countdownDate = new Date(Date.now() + (0o0 * 0o0 * 0o0 * 0o0 * 1000) + (0o0 * 0o0 * 0o0 * 1000) + (0o0 * 60 * 1000) + (12 * 1000));

// Update the countdown every second
const countdownFunction = setInterval(() => {
    const now = new Date().getTime();
    const distance = countdownDate - now;

    // Calculate time components
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the HTML
    document.getElementById("days").innerText = days;
    document.getElementById("hours").innerText = hours;
    document.getElementById("minutes").innerText = minutes;
    document.getElementById("seconds").innerText = seconds;

    // If the countdown is over, display a message
   if (distance < 0) {
       clearInterval(countdownFunction);
       const countdownElement = document.getElementById("countdown");
       countdownElement.innerHTML = `
           <div>
               <h2>Gotcha !, this website is under construction :D</h2>
               <img src='https://i.gifer.com/79pX.gif'>
               <p>The Developer too lazy for making this website :V</p>
               
           </div>
       `;
   }
        
    
}, 1000);
