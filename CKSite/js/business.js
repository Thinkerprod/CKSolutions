let projects = document.getElementById("projects").children;
let projectPos = document.getElementById("projPos");
console.log(projectPos);
for (var i = 0; i < projects.length; i++) {
  const div = document.createElement("div");
  projectPos.appendChild(div).classList.add("proj-dots");
}

let pos = 3;
let projectPosArray = projectPos.children;
let forward = document.getElementById("forward");
let backward = document.getElementById("backward");

forward.addEventListener("click", clickForward);
backward.addEventListener("click", clickBackward);

function clickForward() {
  if (pos == projects.length - 1) {
    projects[pos].classList.remove("project-selected");
    projectPosArray[pos].classList.remove("proj-dot-selected");
    pos = 0;
    projects[pos].classList.add("project-selected");
    projectPosArray[pos].classList.add("proj-dot-selected");
  } else {
    projects[pos].classList.remove("project-selected");
    projectPosArray[pos].classList.remove("proj-dot-selected");
    pos++;
    projects[pos].classList.add("project-selected");
    projectPosArray[pos].classList.add("proj-dot-selected");
  }
}
function clickBackward() {
  if (pos == 0) {
    projects[pos].classList.remove("project-selected");
    projectPosArray[pos].classList.remove("proj-dot-selected");
    pos = projects.length - 1;
    projects[pos].classList.add("project-selected");
    projectPosArray[pos].classList.add("proj-dot-selected");
  } else {
    projects[pos].classList.remove("project-selected");
    projectPosArray[pos].classList.remove("proj-dot-selected");
    pos--;
    projects[pos].classList.add("project-selected");
    projectPosArray[pos].classList.add("proj-dot-selected");
  }
}
function defaultSelected() {
  projects[pos].classList.add("project-selected");
  projectPosArray[pos].classList.add("proj-dot-selected");
}
defaultSelected();