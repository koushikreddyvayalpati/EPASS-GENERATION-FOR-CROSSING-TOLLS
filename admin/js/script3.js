function selectbox()
{
	var e = document.getElementById("projectlist");
    var indexvalue = e.options[e.selectedIndex].value;
    if(indexvalue=='Java IEEE projects')
    {
    	var projectlist='<select class="" name="subcatagry" style="text-transform: uppercase;"><option required  selected disabled>sub Category</option><option value="2012-2013 Java IEEE projects">2012-2013 Java IEEE projects</option><option value="2013-2014 Java IEEE projects">2013-2014 Java IEEE projects</option><option value="2014-2015 Java IEEE projects">2014-2015 Java IEEE projects</option><option value="2015-2016 Java IEEE projects">2015-2016 Java IEEE projects</option><option value="2016-2017 Java IEEE projects">2016-2017 Java IEEE projects</option><option value="2017-2018 Java IEEE projects">2017-2018 Java IEEE projects</option><option value="2018-2019 Java IEEE projects">2018-2019 Java IEEE projects</option></select>';
    	document.getElementById('changevalue').innerHTML=projectlist;
    }
    if(indexvalue=='Dotnet IEEE projects')
    {
    	var projectlist='<select class="" name="subcatagry" style="text-transform: uppercase;"><option required  selected disabled>sub Category</option><option value="2012-2013 Dotnet IEEE projects">2012-2013 Dotnet IEEE projects</option><option value="2013-2014 Dotnet IEEE projects">2013-2014 Dotnet IEEE projects</option><option value="2014-2015 Dotnet IEEE projects">2014-2015 Dotnet IEEE projects</option><option value="2015-2016 Dotnet IEEE projects">2015-2016 Dotnet IEEE projects</option><option value="2016-2017 Dotnet IEEE projects">2016-2017 Dotnet IEEE projects</option><option value="2017-2018 Dotnet IEEE projects">2017-2018 Dotnet IEEE projects</option><option value="2018-2019 Dotnet IEEE projects">2018-2019 Dotnet IEEE projects</option></select>';
    	document.getElementById('changevalue').innerHTML=projectlist;
    }
   if(indexvalue=='Iot IEEE projects')
    {
    	var projectlist='<select class="" name="subcatagry" style="text-transform: uppercase;"><option required  selected disabled>sub Category</option><option value="IEEE projects">IEEE projects</option><option value="Iot Application projects">Iot Application projects</option></select>';
    	document.getElementById('changevalue').innerHTML=projectlist;
    }
    if(indexvalue=='Ns2 IEEE projects')
    {
    	var projectlist='<select class="" name="subcatagry" style="text-transform: uppercase;"><option required  selected disabled>sub Category</option><option value="2012-2013 Ns2 IEEE projects">2012-2013 Ns2 IEEE projects</option><option value="2013-2014 Ns2 IEEE projects">2013-2014 Ns2 IEEE projects</option><option value="2014-2015 Ns2 IEEE projects">2014-2015 Ns2 IEEE projects</option><option value="2015-2016 Ns2 IEEE projects">2015-2016 Ns2 IEEE projects</option><option value="2016-2017 Ns2 IEEE projects">2016-2017 Ns2 IEEE projects</option><option value="2017-2018 Ns2 IEEE projects">2017-2018 Ns2 IEEE projects</option><option value="2018-2019 Ns2 IEEE projects">2018-2019 Ns2 IEEE projects</option></select>';
    	document.getElementById('changevalue').innerHTML=projectlist;
    }
    if(indexvalue=='Embedded IEEE projects' || indexvalue=='Raspberry pi projects' ||  indexvalue=='PHP Application projects' || indexvalue=='Java Application projects' ||  indexvalue=='Real time Application projects' || indexvalue=='Dotnet Application projects')
    {
    	var projectlist='<select class="" name="subcatagry" style="text-transform: uppercase;"><option required  selected disabled>sub Category</option><option value="IEEE projects">IEEE projects</option><option value="Application projects">Application projects</option></select>';
    	document.getElementById('changevalue').innerHTML=projectlist;
    }
    if(indexvalue=='Matlab IEEE projects')
    {
    	var projectlist='<select class="" name="subcatagry" style="text-transform: uppercase;"><option required  selected disabled>sub Category</option><option value="2012-2013 Matlab IEEE projects">2012-2013 Matlab IEEE projects</option><option value="2013-2014 Matlab IEEE projects">2013-2014 Matlab IEEE projects</option><option value="2014-2015 Matlab IEEE projects">2014-2015 Matlab IEEE projects</option><option value="2015-2016 Matlab IEEE projects">2015-2016 Matlab IEEE projects</option><option value="2016-2017 Matlab IEEE projects">2016-2017 Matlab IEEE projects</option><option value="2017-2018 Matlab IEEE projects">2017-2018 Matlab IEEE projects</option><option value="2018-2019 Matlab IEEE projects">2018-2019 Matlab IEEE projects</option></select>';
    	document.getElementById('changevalue').innerHTML=projectlist;
    }

}