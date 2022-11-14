function moveFeature1() {
	document.location.href = "./feature1.html";
}

function moveFeature1Report1() {
	document.location.href = "./report1.php";
}

function moveFeature2() {
	document.location.href = "./feature2.php";
}

function moveFeature2Report2() {
	document.location.href = "./report2-1.php";
}

function moveFeature3() {
	document.location.href = "./feature3.php";
}

function login() {
	document.location.href = "./index.html";
}

function moveRangeList() {
	document.location.href = "./movieListByRange.php";
}

function moveRangeAndNationList() {
	document.location.href = "./movieListByRangeAndNation.php";
}

function moveGenreList() {
	document.location.href = "./movieListByGenre.php";
}

function moveGenreAndNationList() {
	document.location.href = "./movieListByGenreAndNation.php";
}

function vote() {
	document.location.href = "./vote.php";
}

function cannotVote() {
	alert('Login Please!')
}


function voteSubmit() {
	document.location.href = "./voteResult.php";
	alert('Voted!')
}

function voteUpdate() {
	document.location.href = "./voteResult.php";
	alert('Vote Update!')
}

// Javascript
function clickCheck(target) {
    document.querySelectorAll(`input[type=checkbox]`)
        .forEach(el => el.checked = false);

    target.checked = true;
}

function modifyVote() {
	document.location.href = "./voteModify.php";
}

function deleteVote() {
	alert('Vote Delete!')
}

