

<!DOCTYPE html>
<html>
    <head>
</head>
<body>
<p>Κάθε αριθμός αντοιστιχεί στο ερώτημα της άσκησεις. Διάλεξε το ερώτημα που θες και δες το αποτέλεσμα. </p>
    <form name="execute" method="post" action="/action.php">
        <fieldset>
            <legend>Επέλεξε το ερώτημα που θες να εκτελεστεί</legend>
            <div>
                <input type="radio" id="q1" name="query" value="q1" onclick="show();">
                <label for="q1">Ερώτημα 1</label>
            </div>
            <div>
                <input type="radio" id="q2" name="query" value="q2" onclick="hide();">
                <label for="q2">Ερώτημα 2</label>
            </div>
            <div>
                <input type="radio" id="q3" name="query" value="q3" onclick="hide();">
                <label for="q3">Ερώτημα 3</label>
            </div>
            <div>
                <input type="radio" id="q4" name="query" value="q4" onclick="hide();">
                <label for="q4">Ερώτημα 4</label>
            </div>
            <div>
                <input type="radio" id="q5" name="query" value="q5" onclick="hide();">
                <label for="q5">Ερώτημα 5</label>
            </div>
            <div>
                <input type="radio" id="q6" name="query" value="q6" onclick="hide();">
                <label for="q6">Ερώτημα 6</label>
            </div>
            <div>
                <input type="radio" id="q7" name="query" value="q7" onclick="hide();">
                <label for="q7">Ερώτημα 7</label>
            </div>
            <div>
                <input type="radio" id="q8" name="query" value="q8" onclick="hide();">
                <label for="q8">Ερώτημα 8</label>
            </div>
            <br><br>
            <input type="submit" name="submit1" id="submit1">
        </fieldset>
    </form>
    <style>#forma{
        display: none;
    }</style>
    <br>
    <br>
    <div id="forma">
        <form name="programs" method="post" action="/action.php">
            <label for="date">Επίλεξε την ημερομηνία</label>
            <input type="date" id="date" name="date" value="" min="1000-00-00" max="2022-6-30">
            <br>
            <label for="duration">Επίλεξε την διάρκεια</label>
            <input type="number" id="num" name="num" value="">
            <br><br>
            <input type="submit" name="submit2" id="submit2">
        </form>
    </div>
<script>
    function show(){
        var forma = document.getElementById("forma");
        forma.style.display = 'inline';
    }
    function hide(){
        var forma = document.getElementById("forma");
        forma.style.display = 'none';
    }
</script>
</body>
</html>