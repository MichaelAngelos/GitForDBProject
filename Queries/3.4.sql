USE elidek;

SELECT DISTINCT a.organismstitle
#Krata toys organismoys gia toys opoioys isxyoyn ta parakatw:
FROM(
SELECT DISTINCT project.organismstitle,
	count(project.organismstitle) AS c1,
	YEAR(project.started) as years
FROM project
GROUP BY project.organismstitle,years
)
#Krataw ta project poy anelabe enas organismos ana xronia
#Metrame ta project poy ksekinhsan ekeinh thn xronia,aneksarthtws
#an o organismos exei project poy einai energa apo prohgoymenes xronies.
#Toylaxiston etsi katalabame apo thn ekfwnhsh toy erwthmatos
AS a,
(
SELECT DISTINCT project.organismstitle,
	count(project.organismstitle) AS c1,
	YEAR(project.started) as years
FROM project
GROUP BY project.organismstitle,years
)
#Xreiazomai antigrafo toy prohgoymenoy table gia tis epomenes
#prakseis opote to ksanaftiaxnw
AS b
WHERE (
#Thelw na krathsw toys organismoys gia toys opoioys:
a.organismstitle=b.organismstitle
#Gia ton idio organismo
AND a.c1=b.c1
#To plhthos twn ergwn ana xronia einai idio
AND a.c1>9
#To plhthos twn ergwn einai 10 kai panw
AND a.years=b.years+1
#Gia mia xronia KAI gia thn akribws epomenh xronia
)
;
