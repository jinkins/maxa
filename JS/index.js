function connexion()
{
    $.ajax( 
    {
        type: "POST",
        url: "connexion.php" ,
        data : 
        "qui="+$("#qui").val()
        +"&mdp="+$("#mdp").val(),
        datatype: "xml",
        success: reponse,
        error: function() {
            alert('La connexion à la base de donnée a échouée.');
        }
    }
    )
}
