use elidek;

SELECT scient_field.title as ScienceField, projects_scient_field.projectstitle as ProjectName,
worksonproject.researchersname as Researcher
FROM scient_field
INNER JOIN projects_scient_field
ON scient_field.title = projects_scient_field.scientsfieldtitle
#Gia kathe pedio briskoyme poia erga asxoloynte me ayto to pedio
INNER JOIN worksonproject
ON projects_scient_field.projectstitle = worksonproject.projectstitle
#Gia kathe project briskoyme poioi ereynhtes doyleyoyn sto pedio
INNER JOIN project
ON project.title = projects_scient_field.projectstitle
#Prepei na krathsoyme ta project poy einai energa.Ta project
#poy einai energa exoyn hmeromhnia lhkshs 0000-00-00
WHERE project.ended="0000-00-00"
ORDER BY scient_field.title;
