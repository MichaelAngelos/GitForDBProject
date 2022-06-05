use elidek;
select c.badget,p.stemsname from (project as p join company as c on p.organismstitle=c.title) 
order by c.badget desc
limit 5;