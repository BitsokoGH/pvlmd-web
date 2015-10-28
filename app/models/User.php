<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_account';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('userpwd', 'remember_token');

    public function getName() {


        $titles = array("Live Streaming", "Share Testimony", "Daily Devotion", "Prayer Request", "Accept Jesus Today", "Giving Online");
        $images = array("349_live_streaming.jpg", "352_share_testimony.jpg", "348_devotion.jpg", "351_prayer_request.jpg", "347_accept_jesus_today.jpg", "350_online_giving.jpg");
        $linkto = array("5364", "5390", "5391", "5392", "5393", "5365");
        $cnt = 0;
        foreach ($titles as $title) {
            ?>

            <div class="col-lg-2">

                <div class='hb-con'>	
                    <div class="content-box">
                        <a href="<?php echo $HOME_URL ?>index.php?page=<?php echo $linkto[$cnt] ?>"   title="<?php echo $title ?>"><img src='<?php echo $HOME_URL ?>resources/images/<?php echo $images[$cnt] ?>' style='align:center;border:none' /></div>
                    </a>   </div>       
            </div>

            <?php
            $cnt++;
        }
        return $this->firstname . " " . $this->lastname;
    }

}
