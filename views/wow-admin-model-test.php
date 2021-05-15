<?php

use Woof\Model\Wordpress\Manager\Post;
use Woof\Model\Wordpress\Manager\PostType;
use Woof\Model\Wordpress\Manager\Role;
use Woof\Model\Wordpress\Manager\Term;
use Woof\Model\Wordpress\Manager\User;
?>

<style>
.tests {
    display: flex;
    flex-wrap: wrap;
}

.tests section {
    padding: 1rem;
    border: solid 1px #000;
    margin: 0.5rem;
    flex-grow: 1;
    background-color: #fafafa;
}


.tests table {
    background-color: #ccc;
}


.tests table td, .tests table th {
    border: solid 1px #000 !important;
}

.tests table tr:nth-child(odd) {
    background-color: #ffd;
}

</style>


<?php


echo '<div class="tests">';

    $postTypes = PostType::getAll();

    echo '<section>';
        echo '<h2>Post type list</h2>';
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
        echo '<h2>Role list</h2>';
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
        echo '<h2>Current user</h2>';
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
        echo '<h2>User list</h2>';
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
    $taxonomies = Term::getAll();

    echo '<section>';
        echo '<h2>Taxonomies list</h2>';
        echo '<table>';
        foreach($taxonomies as $taxonomy) {
            echo '<tr>';
                echo '<th>';
                echo $taxonomy->getId();
                echo '</th>';
                echo '<td>';
                    echo $taxonomy->getName();
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    echo '</section>';



    echo '<hr />';
    $terms = Term::getAll();

    echo '<section>';
        echo '<h2>Term list</h2>';
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
        echo '<h2>Published posts</h2>';
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


    echo '<hr />';
    $posts = Post::getAllDraft();

    echo '<section>';
        echo '<h2>Draft posts</h2>';
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
        echo '<h2>All posts</h2>';
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

