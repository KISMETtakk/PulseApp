const container = document.querySelector('.container');
const registerLink = document.querySelector('.register-link');
const signupLink = document.querySelector('.signup-link');

registerLink.onclick = () =>{

    container.classList.add('active');
}

signupLink.onclick = () =>{

    container.classList.remove('active');
}