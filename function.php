<?php 

                    function getRows($sql, $type=ASSOC) {
                        $result = mysql_query($sql);
                        if($type == ASSOC) {
                            while($row = mysql_fetch_array($result))
                                $ret[] = $row;
                        }else if($type == NUM) {
                            while($row = mysql_fetch_row($result))
                                $ret[] = $row;
                        }else{
                            die("type should be NUM or ASSOC");
                        }
                        return $ret;
                    }
 ?>