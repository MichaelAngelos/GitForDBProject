use elidek;

SELECT DISTINCT programm.title as ProgrammName
FROM programm;
#Table poy periexei kathe programma

SELECT r1.*,dates.Duration
#Prwta tha krathsw plhrofories gia ta project
#kai meta tha ypologisw ta durations
FROM
(
SELECT DISTINCT project.title AS ProjectName,
	project.started AS Since,
	executive.named AS Funded_By
FROM project
INNER JOIN executive
ON executive.named = project.stemsname
#Krata to onoma toy project,thn hmeromhnia poy arxise kai
#to stelexos toy project
) AS r1
INNER JOIN
#Gia kathe Project,thelw na ypologisw to duration se meres
#Opote:
(
SELECT project.title,DATEDIFF(project.ended,project.started) as Duration
FROM project
WHERE project.ended!='0000-00-00'
#Gia kathe project poy exei lhksei,ypologise thn diarkeia
#Kai krata ta
UNION
#Bale sto table:
SELECT project.title,DATEDIFF(CURDATE(),project.started)
FROM project
WHERE project.ended='0000-00-00'
#Kathe energo project kai thn diarkeia toy project
) as dates 
on r1.ProjectName=dates.title
#Gia kathe project krata thn antistoixh diarkeia
ORDER BY r1.ProjectName;

SELECT DISTINCT project.title as NameOfProject,worksonproject.researchersname as ResearchersInProject
FROM project
INNER JOIN worksonproject
ON project.title = worksonproject.projectstitle
#Krata toys ereynhtes poy doyleyoyn sto kathe project
ORDER BY NameOfProject;
