const fs=require('fs')
const validator=require('validator')
const getNote=require('./notes.js')
var message=getNote();
console.log(message);

fs.writeFileSync('notes.txt','bleh bleh bleh');

fs.appendFileSync('notes.txt',' I do not say bleh bleh bleh')

//1.create a new file called 'notes.js'
//2. create getnotes function that returns "Your notes"
//3. export getnotes function 
//4. from app.js , load in and call the function printing message to console