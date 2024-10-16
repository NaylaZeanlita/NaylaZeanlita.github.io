function welcome(name) {
    var name = prompt("What's your name?");
    console.log(name);
    return "Welcome " + name + ", to the road construction project monitoring website, we provide information on project developments that can be accessed publicly.";
}

function displayWelcome() {
    var message = welcome();
    document.getElementById('welcomeUser').textContent = message;
}

