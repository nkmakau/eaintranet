var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "Wiz?dan1",
  database: "CMINTRANET"
});

con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT * FROM EBU_ScoreCard", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});
