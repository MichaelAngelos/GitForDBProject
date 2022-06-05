use elidek;
select s.scientsfieldtitle,w.scientsfieldtitle,count(s.scientsfieldtitle) as stotal from projects_scient_field as s join projects_scient_field as w on s.projectstitle=w.projectstitle
where s.scientsfieldtitle<>w.scientsfieldtitle
group by s.scientsfieldtitle,w.scientsfieldtitle 
order by stotal desc
limit 6;
