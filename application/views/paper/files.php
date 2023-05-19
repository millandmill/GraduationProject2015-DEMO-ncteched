<?php
if (isset($files) && count($files))
{
   ?>
      <ul>
         <?php
         foreach ($files as $file)
         {
            ?>
            <li class="image_wrap">
               
               
               <?php echo $file->paper_file_show ?><br />
            </li>
            <?php
         }
         ?>
      </ul>
   </form>
   <?php
}
else
{
   ?>
   <p>No Files Uploaded</p>
   <?php
}
?>