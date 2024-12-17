document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.number'); // Select all elements with the 'number' class
  
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target'); // Get the target value
        const current = +counter.innerText.replace('+', ''); // Get the current value
        const increment = Math.ceil(target / 100); // Increment value for smooth animation
  
        if (current < target) {
          counter.innerText = current + increment + '+'; // Increment and update text
          setTimeout(updateCount, 30); // Call the function again after 30ms
        } else {
          counter.innerText = target + '+'; // Ensure the final value matches the target
        }
      };
  
      updateCount();
    });
  });
  