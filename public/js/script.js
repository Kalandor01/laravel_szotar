$(document).ready(function()
{
    $(".temaInput").on("change", checkAnswer);
});

var joImg = "../imgs/jo.png";
var roszImg = "../imgs/rosz.png";

var score = 0;

function checkAnswer(evt)
{
    let input = $(evt.target);
    let inputId = input.attr("id").split("_")[1];
    let value = input.val();
    let expected = input.attr("name");
    let valaszImg = $(`#joValasz_${inputId}`);
    console.log(valaszImg);
    if (value == expected)
    {
        valaszImg.attr("src", joImg);
        score++;
    }
    else
    {
        if (valaszImg.attr("src") == joImg)
        {
            score--;
        }
        valaszImg.attr("src", roszImg);
    }
    updateScore();
}

function updateScore()
{
    $("#eredmenyText").text(`Összpontszám: ${score}`);
}