const chalk=require('chalk')

const yargs=require('yargs')
const fs=require('fs')
const validator=require('validator')

const getNote=require('./notes.js')
var message=getNote();
console.log(message);

fs.writeFileSync('notes.txt','bleh bleh bleh');

fs.appendFileSync('notes.txt',' I do not say bleh bleh bleh')

console.log(chalk.green.bold("success!"))
// add command
yargs.command({
    command: 'add',
    describe: 'add a note',
    builder:{
        title:{
            describe: 'Note Title',
            demandOption: true,
            type: 'string'
        },
        body:{
            
        }
    },
    handler: function(){
        console.log("added a note")
    }
})

//remove command
yargs.command({
    command:'remove',
    describe: 'removes a note',
    handler: function(){
        console.log("removed the note")
    }
})

//list command
yargs.command({
    command: 'list',
    describe: 'lists the notes',
    handler: function(){
        console.log("listed notes :)")
    }
})

//read command
yargs.command({
    command: 'read',
    describe: 'reads the note',
    handler: function (){
        console.log("reading the note")
    }
})

yargs.parse()