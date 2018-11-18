const title = document.getElementById("head-text");

const typewriter = new Typewriter(title, {
  loop: true,
});

typewriter
  .typeString("Home's Magic")
  .pauseFor(2500)
  .deleteAll()
 

  .start();

