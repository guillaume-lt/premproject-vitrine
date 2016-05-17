    <div class="page_title title_section">  
        <div class="row">
            <div class="col-md-12">
                <?= $sectionTitle ?>
            </div>
        </div>
    </div>
</div> <!-- Container gradient end -->
<div class="container contact_us">
    <div class="content">
        <div class="row">
            <div class="col-md-12 contact">
                    <?php
                        $destinataire = 'guillaumelebelt@gmail.com';
                        $copie = 'oui';
                        $form_action = '';

                        $message_envoye = "Merci, votre message nous est bien parvenu, vous pouvez revenir à la page d'accueil de PremProject";
                        $message_non_envoye = "Votre message ne nous est pas parvenu, veuillez réessayer, merci !";

                        $message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

                        function NoSpamQuestion($mode = 'ask', $answer = 0)
                        {
                            $array_pictures = array(); $j = 0;

                            $array_pictures[$j]['num'] = $j;
                            $array_pictures[$j]['question'] = "Quelle est la première lettre du mot projet";
                            $array_pictures[$j]['answer'] = "p";
                            $j++;

                            $array_pictures[$j]['num'] = $j;
                            $array_pictures[$j]['question'] = "Ecrire 12 en lettres";
                            $array_pictures[$j]['answer'] = "douze";
                            $j++;

                            if ($mode != 'ans')
                            {
                                $lambda = rand(0, count($array_pictures)-1);
                                return $array_pictures[$lambda];
                            }
                            else
                            {
                                foreach($array_pictures as $i => $array)
                                {
                                    if ($i == $answer)
                                    {
                                        return $array;
                                        break;
                                    };
                                };
                            };
                        };

                        $nospam = NoSpamQuestion();

                        function Rec($text)
                        {
                            $text = htmlspecialchars(trim($text), ENT_QUOTES);
                            if (1 === get_magic_quotes_gpc())
                            {
                                $text = stripslashes($text);
                            }

                            $text = nl2br($text);
                            return $text;
                        };

                        function IsEmail($email)
                        {
                            $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
                            return (($value === 0) || ($value === false)) ? false : true;
                        }

                        $nom        = (isset($_POST['nom']))        ? Rec($_POST['nom'])        : '';
                        $email      = (isset($_POST['email']))      ? Rec($_POST['email'])      : '';
                        $objet      = (isset($_POST['objet']))      ? Rec($_POST['objet'])      : '';
                        $mobile     = (isset($_POST['mobile']))     ? Rec($_POST['mobile'])     : '';
                        $message    = (isset($_POST['message']))    ? Rec($_POST['message'])    : '';
                        $antispam_h = (isset($_POST['antispam_h'])) ? Rec($_POST['antispam_h']) : '';
                        $antispam_r = (isset($_POST['antispam_r'])) ? Rec($_POST['antispam_r']) : '';

                        $email = (IsEmail($email)) ? $email : '';
                        $err_formulaire = false;

                        if (isset($_POST['envoi']))
                        {
                            $verif_nospam = NoSpamQuestion('ans', $antispam_r);

                            if (strtolower($antispam_h) != strtolower($verif_nospam['answer']))
                            {
                                echo '<p class="message_not">Vous n\'avez pas répondu correctement à la question Antispam<br /><a href="'.$urlbase.'contact">PremProject - Contact</a></p>';
                            }
                            else
                            {
                                if (($nom != '') && ($email != '') && ($objet != '') && ($message != '') && ($message != ''))
                                {
                                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                                    $headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
                                        'Reply-To:'.$email. "\r\n" .
                                        'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
                                        'Content-Disposition: inline'. "\r\n" .
                                        'Content-Transfer-Encoding: 7bit'." \r\n" .
                                        'X-Mailer:PHP/'.phpversion();

                                    if ($copie == 'oui')
                                    {
                                        $cible = $destinataire.';'.$email;
                                    }
                                    else
                                    {
                                        $cible = $destinataire;
                                    };

                                    $message = str_replace("&#039;","'",$message);
                                    $message = str_replace("&#8217;","'",$message);
                                    $message = str_replace("&quot;",'"',$message);
                                    $message = str_replace('<br>','',$message);
                                    $message = str_replace('<br />','',$message);
                                    $message = str_replace("&lt;","<",$message);
                                    $message = str_replace("&gt;",">",$message);
                                    $message = str_replace("&amp;","&",$message);

                                    $num_emails = 0;
                                    $tmp = explode(';', $cible);
                                    foreach($tmp as $email_destinataire)
                                    {
                                        if (mail($email_destinataire, $objet, $message, $headers))
                                            $num_emails++;
                                    }

                                    if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
                                    {
                                        echo '<p class="message_ok">'.$message_envoye.'<br /><a href="'.$urlbase.'">PremProject - Home</a></p>';
                                    }
                                    else
                                    {
                                        echo '<p class="message_not">'.$message_non_envoye.'<br /><a href="'.$urlbase.'contact">PremProject - Contact</a></p>';
                                    };
                                }
                                else
                                {
                                    echo '<p>'.$message_formulaire_invalide.'</p>';
                                    $err_formulaire = true;
                                };
                            };
                        };

                        if (($err_formulaire) || (!isset($_POST['envoi'])))
                        {
                            echo '
                            <form autocomplete="off" id="contact" method="post" action="'.$form_action.'">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Entrez votre Nom" type="text" id="nom" name="nom" value="'.stripslashes($nom).'" tabindex="1" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Entrez votre Téléphone" type="text" id="mobile" name="mobile" value="'.stripslashes($mobile).'" tabindex="2" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Entrez votre Mail" type="text" id="email" name="email" value="'.stripslashes($email).'" tabindex="3" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Entrez L\'objet de votre Mail" type="text" id="objet" name="objet" value="'.stripslashes($objet).'" tabindex="4" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Votre Message" id="message" name="message" tabindex="5" cols="30" rows="8">'.stripslashes($message).'</textarea>
                                </div>
                                <div class="form-group">
                                    <p>Antispam</p>
                                    <span class="antispam_question">
                                        '.$nospam['question'].'
                                    </span>
                                    <span class="antispam_answer">
                                        <input type="text" name="antispam_h" id="antispam_h" />
                                        <input type="hidden" name="antispam_r" value="'.$nospam['num'].'" />
                                    </span>
                                    <br />

                                    <button type="submit" name="envoi" class="btn btn_submit">Submit</button>
                                    <button type="reset" class="btn btn_reset">Reset</button>
                            </form>';
                        };
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>