-----------------------------------------------------------------------

-----------------------------------------------------------------------
1. Put "downloads" folder to amember/templates directory
2. Go to aMember CP -> Setup -> Plugins and enable "downloads" plugin.
3. Go to aMember CP -> Setup -> Downloads and configure it
   set "Costs file fields delimiter" to | (pipe)
4. Put file costs.txt to your download folder with the following content:
   filename|cost(in units)|file description(can be skipped)
   if file is not listed in this file, it will be displayed
   without description and cost of this file will be equal to 1 unit.