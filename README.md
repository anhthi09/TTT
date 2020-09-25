# TTT
<?php
                    $sql = "SELECT * FROM `category`";
                    $category = DataProvider::ExecuteQuery($sql);
                    while ($loai = mysqli_fetch_array($category)) {

                        $chuoi = <<< EOD
                          <li><a class="a" href="/TTT/public/pages/show-row.php?id={$loai['id']}">  {$loai['name']}</a>
                          <ul class="submenu">
                          EOD;
                        echo $chuoi;

                        $sql1 = "SELECT * FROM `type` WHERE `category` = {$loai['id']}";
                        $type = DataProvider::ExecuteQuery("$sql1");

                        while ($type1 = mysqli_fetch_array($type)) {
                            $chuoi1 = <<< EOD
                      
                            <li><a href="/TTT/public/pages/show-row.php?id={$type1['id']}"> {$type1['name']}</a></li>                                                                                  
                     EOD;
                            echo $chuoi1;
                        }
                        echo " </ul>";
                    }
                    echo   "</li>";
                    ?>