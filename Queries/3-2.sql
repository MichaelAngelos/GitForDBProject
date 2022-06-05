use elidek;

DROP VIEW IF EXISTS whatresearcher;
CREATE VIEW whatresearcher AS
SELECT DISTINCT researcher.named as Researcher,project.title as SupervisorOn,worksonproject.projectstitle as WorksOn,evaluates.projectstitle as Evaluates
FROM researcher
LEFT JOIN project 
ON project.researchersname=researcher.named
#Prosthetoyme Column gia ta erga sta opoia o ereynhths einai ypeythynos
LEFT JOIN worksonproject
on worksonproject.researchersname=researcher.named
#Prosthetoyme Column gia ta erga sta opoia o ereynhths doyleyei
LEFT JOIN evaluates
on evaluates.researchersname=researcher.named;
#Prosthetoyme Column gia ta erga ta opoia aksiologoynte apo ton ereynhth

DROP VIEW IF EXISTS sciencefieldtoproject;
CREATE VIEW sciencefieldtoproject AS
SELECT DISTINCT scient_field.title as ScienceField,projects_scient_field.projectstitle as ProjectOnScienceField
FROM scient_field
INNER JOIN projects_scient_field
on scient_field.title=projects_scient_field.scientsfieldtitle;
#H arxh toy 3.3 cause why not,kapoios isws apla thelei na dei gia
#ena episthmoniko pedio,poia project asxoloyntai me ayto

select * from whatresearcher;
select * from sciencefieldtoproject;
