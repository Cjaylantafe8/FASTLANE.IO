

document.addEventListener('DOMContentLoaded', () => {

 
    const contactForm = document.querySelector('.contact-section form');
    const submitButton = document.querySelector('.submit-button');

    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
           
            event.preventDefault();

   
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!email || !message) {
                showMessageBox("Please fill out both the email and message fields.", "error");
                return;
            }

           
            submitButton.textContent = 'Sending...';
            submitButton.disabled = true;

            
            setTimeout(() => {
                
                console.log('Form Submitted:', { email, message });
                
               
                showMessageBox("Thank you for your message! We will be in touch soon.", "success");

               
                contactForm.reset();
                submitButton.textContent = 'Send';
                submitButton.disabled = false;

            }, 2000);
        });
    }


   
    function showMessageBox(message, type = 'info') {
        let messageBox = document.getElementById('message-box');
        
       
        if (!messageBox) {
            messageBox = document.createElement('div');
            messageBox.id = 'message-box';
            
           
            messageBox.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 25px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                color: white;
                font-family: 'Inter', sans-serif;
                z-index: 1000;
                transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
                opacity: 0;
                transform: translateY(-20px);
            `;
            document.body.appendChild(messageBox);
        }

        
        let bgColor = '#4f46e5'; 
        if (type === 'success') {
            bgColor = '#10b981'; 
        } else if (type === 'error') {
            bgColor = '#ef4444'; 
        }
        
        messageBox.style.backgroundColor = bgColor;
        messageBox.textContent = message;

     
        messageBox.style.opacity = 1;
        messageBox.style.transform = 'translateY(0)';

     
        clearTimeout(messageBox.timeoutId);
        messageBox.timeoutId = setTimeout(() => {
            messageBox.style.opacity = 0;
            messageBox.style.transform = 'translateY(-20px)';
        }, 5000);
    }
    
   
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
               
                entry.target.classList.add('is-visible');
            } else {
              
                entry.target.classList.remove('is-visible');
            }
        });
    }, {
        
        threshold: 0.1
    });

    
    const sectionsToObserve = document.querySelectorAll('.fl-mv-section > div, .contact-section, .fl-footer-section');
    sectionsToObserve.forEach(section => {
       
        observer.observe(section);
    });

});
