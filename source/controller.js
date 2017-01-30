
$(document).ready(function () {
	
	var questionBank=new Array;
	var wordArray=new Array;
	var previousGuesses=new Array;
 	var currentWord;
	var currentClue;
	var wrongAnswerCount;
	//REGISTER
 
 
 		$.getJSON('quizbank.json', function(data) { 

		for(i=0;i<data.wordlist.length;i++){ 
			questionBank[i]=new Array;
			questionBank[i][0]=data.wordlist[i].word;
			questionBank[i][1]=data.wordlist[i].clue;
		}
		titleScreen();
		})//GET JSON WORDLIST
 

function titleScreen(){
	$('#gameContent').append('<div id="gameTitle">HÄNGA GUBBE</div>\
		<div id="startButton" class="button">STARTA</div>');		
	$('#startButton').on("click",function (){gameScreen()});
}//GAME DISPLAY
	
	
	
function gameScreen(){
	$('#gameContent').empty();
	$('#gameContent').append('<div id="pixHolder"><img id="hangman" src="man.png"></div>');
	$('#gameContent').append('<div id="wordHolder"></div>');
	$('#gameContent').append('<div id="clueHolder"></div>');
	$('#gameContent').append('<div id="guesses">Tidigare chansning:</div>');
	$('#gameContent').append('<div id="feedback"></div>');
	$('#gameContent').append('<form><input type="text" id="dummy" ></form>');
			
	getWord();
	var numberOfTiles=currentWord.length;
	wrongAnswerCount=0;
	previousGuesses=[];
			 
	for(i=0;i<numberOfTiles;i++){
		$('#wordHolder').append('<div class="tile" id=t'+i+'></div>');
	}
			
	$('#clueHolder').append("Ledtråd: "+currentClue);
 
 	
	$(document).on("keyup",handleKeyUp);
	$(document).on("click",function(){$('#dummy').focus();});
	$('#dummy').focus();
}//GAMESCREEN
			
			
function getWord(){
	var rnd=Math.floor(Math.random()*questionBank.length);
	currentWord=questionBank[rnd][0];
	currentClue=questionBank[rnd][1];
	questionBank.splice(rnd,1); 
	wordArray=currentWord.split("");			
}//GET WORD
			

			
			
function handleKeyUp(event) {
	
	//this line deals with glitch in recent versions of android
	if(event.keyCode==229){event.keyCode=$('#dummy').val().slice($('#dummy').val().length-1,$('#dummy').val().length).toUpperCase().charCodeAt(0);}
		
	if(event.keyCode>64 && event.keyCode<91){
		var found=false;
		var previouslyEntered=false;
		var input=String.fromCharCode(event.keyCode).toLowerCase();
		
	
		for(i=0;i<previousGuesses.length;i++){if(input==previousGuesses[i]){previouslyEntered=true;}}
				
		if(!previouslyEntered){
			previousGuesses.push(input);
			for(i=0;i<wordArray.length;i++){
				if(input==wordArray[i]){found=true;$('#t'+i).append(input);}	
			}//for
				
			if(found){checkAnswer();}
			else{wrongAnswer(input);}
		}//if
	}//if
}//HANDLERKEYUP
	

function checkAnswer(){
	var currentAnswer="";	
	for(i=0;i<currentWord.length;i++){
		currentAnswer+=($('#t'+i).text());
	}		
	if(currentAnswer==currentWord){
		victoryMessage();
	};
}//ANSWER CHECK
		

function wrongAnswer(a){
	wrongAnswerCount++;
	var pos=(wrongAnswerCount*-75) +"px"
	$('#guesses').append("  "+a);
	$('#hangman').css("left",pos);
	if(wrongAnswerCount==6){
		defeatMessage();}
}//ANSWER WRONG
	

function victoryMessage(){
	document.activeElement.blur();
	$(document).off("keyup", handleKeyUp);
	$('#feedback').append("RÄTT!<br><br><div id='replay' class='button'>FORTSÄTT</div>");
	$('#replay').on("click",function (){
		if(questionBank.length>0){
			gameScreen()}
		else{finalPage()}
	});
}//MESSAGE VICTORY
		

function defeatMessage(){
	document.activeElement.blur();
	$(document).off("keyup", handleKeyUp);
	$('#feedback').append("Ajdå!<br> rätt svar: "+ currentWord +"<div id='replay' class='button'>CONTINUE</div>");
	$('#replay').on("click",function (){
		if(questionBank.length>0){
			gameScreen()}
		else{finalPage()}
	});
}//MASSAGE DEFEAT


function finalPage(){
	$('#gameContent').empty();
	$('#gameContent').append('<div id="finalMessage">Du är bäst, alla ord klarade!</div>');
}//FINAL PAGE
	
	});//DOC READY