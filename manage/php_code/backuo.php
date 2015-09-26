<?php
/**
 * Created by PhpStorm.
 * User: zh
 * Date: 15-9-25
 * Time: 上午2:52
 */
/*function do_html_players_info_with_pass_no_pass_first($return_val)
{
    foreach($return_val as $key =>$value )
    {


        $average_score = $value['average_score'];
        $player_info = get_player_info_from_id($value['player_id']);
        $student_id = $player_info['studentid'];
        $player_name = $player_info['name'];
        $interview_info_one = $value['interview_info_one'];
        $interview_info_two = $value['interview_info_two'];
        $judge_info_one = get_player_info_from_id($interview_info_one['judges_id']);
        $judge_info_two = get_player_info_from_id($interview_info_two['judges_id']);

        ?>
        <table class="table table-hover">
            <tr>
                <th>名字</th>
                <th>学号</th>
                <th>均分</th>
                <th>More</th>
                <th>选择</th>
            </tr>
            <tr>
                <td><?php echo $player_name; ?></td>
                <td><?php echo $student_id; ?></td>
                <td><?php echo $average_score; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="collapse"
                            data-target="#first<?php echo $key; ?>">
                        更多
                    </button>
                </td>
                <td>
                    <form name="input_first<?php echo $key; ?>" action="" method="get">
                        <label>暂定：<input type="radio" name="status" value="wait" checked="checked"></label>
                        <label>通过：<input type="radio" name="status" value="pass"></label>
                        <label>不通过：<input type="radio" name="status" value="no_pass"></label>
                        <input type="hidden"  name="player_id" value="<?php echo $player_info['id'];?>">
                    </form>

                </td>
            </tr>
        </table>

        <div id="first<?php echo $key; ?>" class="collapse ">
            <table class="table table-striped table-condensed">
                <tr>
                    <th><?php echo $judge_info_one['name']; ?>的评价</th>
                    <td><?php echo $interview_info_one['comment']; ?>
                    <td>
                </tr>
                <tr>
                    <th><?php echo $judge_info_two['name']; ?>的评价</th>
                    <td><?php echo $interview_info_two['comment'];?>
                    <td>
                </tr>
            </table>
            <table class="table  table-striped table-condensed">
                <tr>
                    <th>评委</th>
                    <th>均分</th>
                    <th>面试态度</th>
                    <th>集体态度</th>
                    <th>人生态度</th>
                    <th>基础知识</th>
                    <th>方向知识</th>
                </tr>
                <tr>
                    <td><?php echo $judge_info_one['name'];?></td>
                    <td><?php echo $interview_info_one['score'];?></td>
                    <td><?php echo $interview_info_one['interview_attitude'];?></td>
                    <td><?php echo $interview_info_one['group_attitude'];?></td>
                    <td><?php echo $interview_info_one['life_attitude'];?></td>
                    <td><?php echo $interview_info_one['base_knowledge'];?></td>
                    <td><?php echo $interview_info_one['direction_knowledge'];?></td>
                </tr>
                <tr>
                    <td><?php echo $judge_info_two['name'];?></td>
                    <td><?php echo $interview_info_two['score'];?></td>
                    <td><?php echo $interview_info_two['interview_attitude'];?></td>
                    <td><?php echo $interview_info_two['group_attitude'];?></td>
                    <td><?php echo $interview_info_two['life_attitude'];?></td>
                    <td><?php echo $interview_info_two['base_knowledge'];?></td>
                    <td><?php echo $interview_info_two['direction_knowledge'];?></td>
                </tr>
            </table>
        </div>

        <?php
    }

}
*/