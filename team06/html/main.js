function main() {
	document.location.href = "./index.php";
}

function moveFeature1() {
	document.location.href = "./feature1.php";
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
	document.location.href = "./voteResult.php";
}

function login() {
	document.location.href = "./index.php";
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
	document.location.href = "./voteSave.php"; //voteResult
	alert('Voted!');
}

function voteUpdate() {
	document.location.href = "./voteUpdate.php";
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
	document.location.href = "./voteDelete.php";
	alert('Vote Delete!')
} 

function moveLogin() {
	document.location.href = "./login.html";
}

function moveLogout() {
	document.location.href = "./logout.php";
}


