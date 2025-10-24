<?php
/**
 * Template Name: Events Feed
 */

get_header(); ?>

<main class="events-feed">
  <h1>Upcoming Events</h1>

  <?php
  // Path to JSON file inside plugin
  $json_file = WP_PLUGIN_DIR . '/visual-assembly-directory/sample_events.json';

  if ( file_exists( $json_file ) ) {
      $json_data = file_get_contents( $json_file );
      $events = json_decode( $json_data, true );

      if ( json_last_error() === JSON_ERROR_NONE && ! empty( $events ) ) {
          // Sort events by date (newest upcoming first)
          usort( $events, function( $a, $b ) {
              return strtotime( $a['date'] ) - strtotime( $b['date'] );
          });

          echo '<div class="events-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">';

          foreach ( $events as $event ) {
              $date = date( 'F j, Y', strtotime( $event['date'] ) );
              echo '<div class="event-card" style="border:1px solid #ddd;padding:20px;border-radius:10px;background:#fff;">';
              echo '<h3 style="margin-top:0;">' . esc_html( $event['title'] ) . '</h3>';
              echo '<p><strong>Date:</strong> ' . esc_html( $date ) . '</p>';
              echo '<p><strong>Location:</strong> ' . esc_html( $event['location'] ) . '</p>';
              echo '</div>';
          }

          echo '</div>';
      } else {
          echo '<p>Unable to load events at this time.</p>';
      }
  } else {
      echo '<p>Error: events file not found.</p>';
  }
  ?>
</main>

<?php get_footer(); ?>

