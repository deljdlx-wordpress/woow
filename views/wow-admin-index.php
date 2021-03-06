<?php

use Woof\Model\Wordpress\Manager\Post;
use Woof\Model\Wordpress\Manager\PostType;
use Woof\Model\Wordpress\Manager\Role;
use Woof\Model\Wordpress\Manager\Term;
use Woof\Model\Wordpress\Manager\User;
?>

<style>


td, th {
    border: solid 1px #000 !important;
    text-transform: none;

}

</style>


<?php


echo '<div>';

    $postTypes = PostType::getAll();

    echo '<section>';
        echo '<table>';
        foreach($postTypes as $postType) {
            echo '<tr>';
                echo '<th>';
                    echo $postType->getId();
                echo '</th>';
                echo '<td>';
                    echo $postType->getLabel();
                echo '</td>';
                echo '<td>';
                    echo (int) PostType::exists($postType->getId());
                echo '</td>';

            echo '</tr>';
        }

        echo '<tr>';
            echo '<th>';
                echo '0';
            echo '</th>';
            echo '<th>';
                echo 'Fake_Post_Type';
            echo '</th>';
            echo '<td>';
                echo PostType::exists('Fake_Post_Type');
            echo '</td>';

        echo '</tr>';
        echo '</table>';
    echo '</section>';



    echo '<hr />';
    $roles = Role::getAll();

    echo '<section>';
        echo '<table>';
        foreach($roles as $role) {
            echo '<tr>';
                echo '<th>';
                echo $role->getId();
                echo '</th>';
                echo '<td>';
                    echo $role->getName();
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    echo '</section>';




    echo '<hr />';
    $currentUser = User::getCurrent();

    echo '<section>';
        echo '<table>';
            echo '<tr>';
                echo '<th>';
                echo $currentUser->getId();
                echo '</th>';
                echo '<td>';
                    echo $currentUser->getLogin();
                echo '</td>';
                echo '<td>';
                    echo $currentUser->getEmail();
                echo '</td>';
                echo '<td>';
                    $roles = [];
                    foreach($currentUser->getRoles() as $index => $role) {
                        $roles[] = $role->getName();
                    }
                    echo implode(', ', $roles);

                echo '</td>';
            echo '</tr>';
        echo '</table>';
    echo '</section>';



    echo '<hr />';
    $users = User::getAll();

    echo '<section>';
        echo '<table>';
        foreach($users as $user) {
            echo '<tr>';
                echo '<th>';
                echo $user->getId();
                echo '</th>';
                echo '<td>';
                    echo $user->getLogin();
                echo '</td>';
                echo '<td>';
                    echo $user->getEmail();
                echo '</td>';

                echo '<td>';
                    $roles = [];
                    foreach($user->getRoles() as $index => $role) {
                        $roles[] = $role->getName();
                    }
                    echo implode(', ', $roles);

                echo '</td>';

            echo '</tr>';
        }
        echo '</table>';
    echo '</section>';



    echo '<hr />';
    $terms = Term::getAll();

    echo '<section>';
        echo '<table>';
        foreach($terms as $term) {
            echo '<tr>';
                echo '<th>';
                echo $term->getId();
                echo '</th>';
                echo '<td>';
                    echo $term->getName();
                echo '</td>';
                echo '<td>';
                    echo $term->getTaxonomy()->getName();
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    echo '</section>';








    echo '<hr />';
    $posts = Post::getAllPublish();

    echo '<section>';
        echo '<table>';
        foreach($posts as $post) {
            echo '<tr>';
                echo '<th>';
                echo $post->getId();
                echo '</th>';
                echo '<td>';
                    echo $post->getTitle();
                echo '</td>';
                echo '<td>';
                    echo $post->getType()->getName();
                echo '</td>';
                echo '<td>';
                    echo $post->getStatus();
                echo '</td>';

                echo '<td>';
                    echo $post->getAuthor()->getDisplayName();
                echo '</td>';

                echo '<td>';
                $termList = [];
                    $terms = $post->getTerms();
                    foreach($terms as $term) {
                        $termList[] = $term->getLabel();
                    }
                    echo implode(', ', $termList);

                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    echo '</section>';


    return;



    echo '<hr />';
    $posts = Post::getAllDraft();

    echo '<section>';
        echo '<table>';
        foreach($posts as $post) {
            echo '<tr>';
                echo '<th>';
                echo $post->getId();
                echo '</th>';
                echo '<td>';
                    echo $post->getTitle();
                echo '</td>';
                echo '<td>';
                    echo $post->getStatus();
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    echo '</section>';




    echo '<hr />';
    $posts = Post::getAll();

    echo '<section>';
        echo '<table>';
        foreach($posts as $post) {
            echo '<tr>';
                echo '<th>';
                echo $post->getId();
                echo '</th>';
                echo '<td>';
                    echo $post->getTitle();
                echo '</td>';
                echo '<td>';
                    echo $post->getType()->getName();
                echo '</td>';
                echo '<td>';
                    echo $post->getStatus();
                echo '</td>';

                echo '<td>';
                    echo $post->getAuthor()->getDisplayName();
                echo '</td>';

                echo '<td>';
                $termList = [];
                    $terms = $post->getTerms();
                    foreach($terms as $term) {
                        $termList[] = $term->getLabel();
                    }
                    echo implode(', ', $termList);

                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    echo '</section>';





echo '</div>';








$currentTheme = wp_get_theme();

echo '<div style="border: solid 2px #F00">';
    echo '<div style="; background-color:#CCC">@'.__FILE__.' : '.__LINE__.'</div>';
    echo '<pre style="background-color: rgba(255,255,255, 0.8);">';
    print_r(wp_get_theme());
    echo '</pre>';
echo '</div>';


/*
$parameter = new ThemeParameter('bidule', 'hello world');
/*
$customizer = new SliderJQuery(
    $parameter
);
echo
*/

