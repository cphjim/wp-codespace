<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode( 'djc_gaming', 'djc_gaming_hub_shortcode' );

function djc_gaming_hub_shortcode( $atts ) {
    // Games voor de hub
    DJC_Registry::register_game( 'words', [
        'title' => 'Words',
        'description' => 'Snel typen en leren met woorden!',
        'icon' => DJC_GAMING_URL . 'assets/img/words.png',
        'category' => 'Populair',
        'featured' => true,
        'labels' => ['Nieuw'],
        'sponsor' => 'DJC-Nederland',
    ]);
    DJC_Registry::register_game( 'numbers', [
        'title' => 'Numbers',
        'description' => 'Reken en tel zo snel mogelijk!',
        'icon' => DJC_GAMING_URL . 'assets/img/numbers.png',
        'category' => 'Educatief',
        'featured' => false,
        'labels' => ['Competitie'],
        'sponsor' => '',
    ]);
    DJC_Registry::register_game( 'trivia', [
        'title' => 'Trivia',
        'description' => 'Quiz met algemene kennisvragen!',
        'icon' => DJC_GAMING_URL . 'assets/img/trivia.png',
        'category' => 'Competitie',
        'featured' => false,
        'labels' => ['Nieuw'],
        'sponsor' => '',
    ]);
    DJC_Registry::register_game( 'quiz', [
        'title' => 'Quiz',
        'description' => 'Educatieve quiz voor slimme spelers!',
        'icon' => DJC_GAMING_URL . 'assets/img/quiz.png',
        'category' => 'Educatief',
        'featured' => false,
        'labels' => [],
        'sponsor' => '',
    ]);
    $games = DJC_Registry::get_games();
    ob_start();
    ?>
    <div class="djc-gaming-hub">
        <header>
            <h1>DJC Gaming</h1>
            <p>De hub voor educatieve en competitieve games van DJC-Nederland.</p>
            <select id="djc-gaming-category">
                <option value="all">Alle categorieën</option>
                <option value="Educatief">Educatief</option>
                <option value="Competitie">Competitie</option>
            </select>
        </header>
        <section class="djc-gaming-featured">
            <?php foreach ( $games as $slug => $game ) : if ( !empty($game['featured']) ) : ?>
                <div class="djc-game-banner">
                    <img src="<?php echo esc_url( $game['icon'] ); ?>" alt="<?php echo esc_attr( $game['title'] ); ?>" />
                    <div class="djc-game-info">
                        <h2><?php echo esc_html( $game['title'] ); ?></h2>
                        <p><?php echo esc_html( $game['description'] ); ?></p>
                        <a href="<?php echo site_url('/djc-game?slug=' . $slug); ?>" class="djc-play-btn">Speel nu</a>
                    </div>
                </div>
            <?php endif; endforeach; ?>
        </section>
        <section class="djc-gaming-sections">
            <h3>Populair</h3>
            <div class="djc-game-cards">
                <?php foreach ( $games as $slug => $game ) : ?>
                    <div class="djc-game-card" data-category="<?php echo esc_attr( $game['category'] ); ?>">
                        <img src="<?php echo esc_url( $game['icon'] ); ?>" alt="<?php echo esc_attr( $game['title'] ); ?>" />
                        <h4><?php echo esc_html( $game['title'] ); ?></h4>
                        <p><?php echo esc_html( $game['description'] ); ?></p>
                        <div class="djc-game-labels">
                            <?php foreach ( $game['labels'] as $label ) : ?>
                                <span class="djc-label djc-label-<?php echo strtolower($label); ?>"><?php echo esc_html($label); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php if ( !empty($game['sponsor']) ) : ?>
                            <span class="djc-sponsor-label"><?php echo esc_html($game['sponsor']); ?></span>
                        <?php endif; ?>
                            <button class="djc-play-link" onclick="djcOpenGameOverlay('<?php echo esc_js($slug); ?>')">Openen</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
    <link rel="stylesheet" href="<?php echo DJC_GAMING_URL . 'assets/css/hub.css'; ?>" />
        <script src="<?php echo DJC_GAMING_URL . 'assets/js/hub.js'; ?>"></script>
        <div id="djc-game-overlay" style="display:none;"></div>
        <script>
        function djcOpenGameOverlay(slug) {
            var overlay = document.getElementById('djc-game-overlay');
            overlay.innerHTML = '<div class="djc-overlay-bg" onclick="djcCloseGameOverlay()"></div>' +
                '<div class="djc-overlay-content"><iframe src="' + '/djc-game?slug=' + slug + '" frameborder="0" style="width:100%;height:80vh;"></iframe>' +
                '<button onclick="djcCloseGameOverlay()">Sluiten</button></div>';
            overlay.style.display = 'block';
        }
        function djcCloseGameOverlay() {
            var overlay = document.getElementById('djc-game-overlay');
            overlay.style.display = 'none';
            overlay.innerHTML = '';
        }
        </script>
    <?php
    return ob_get_clean();
}
