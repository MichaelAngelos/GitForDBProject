use elidek;
create index projectstitle on project(title);  #3.8
create index title on projects_scient_field(projectstitle);  #3.5
create index organismstitle on project(organismstitle);  #3.7
create index datend on project(ended); #3.6
