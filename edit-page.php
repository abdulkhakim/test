<div class="wrap">
    <h1><?php esc_html_e( 'Edit/ Delete WhatsApp Form Submissions', 'whatsapp-form' ); ?></h1>
    <table class="widefat">
        <thead>
            <tr>
                <th><?php esc_html_e( 'Name', 'whatsapp-form' ); ?></th>
                <th><?php esc_html_e( 'Phone Number', 'whatsapp-form' ); ?></th>
                <th><?php esc_html_e( 'Message', 'whatsapp-form' ); ?></th>
                <th><?php esc_html_e( 'Action', 'whatsapp-form' ); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'whatsapp_form_submissions';
            $results = $wpdb->get_results( "SELECT * FROM $table_name" );
            foreach ( $results as $result ) {
                ?>
                <tr>
                    <td><?php echo esc_html( $result->name ); ?></td>
                    <td><?php echo esc_html( $result->phone ); ?></td>
                    <td><?php echo esc_html( $result->message ); ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="whatsapp_form_action" value="edit">
                            <input type="hidden" name="whatsapp_form_id" value="<?php echo esc_attr( $result->id ); ?>">
                            <input type="submit" value="<?php esc_attr_e( 'Edit', 'whatsapp-form' ); ?>" class="button">
                        </form>
                        <form method="post" action="">
                            <input type="hidden" name="whatsapp_form_action" value="delete">
                            <input type="hidden" name="whatsapp_form_id" value="<?php echo esc_attr( $result->id ); ?>">
                            <input type="submit" value="<?php esc_attr_e( 'Delete', 'whatsapp-form' ); ?>" class="button" onclick="return confirm('<?php esc_attr_e( 'Are you sure you want to delete this submission?', 'whatsapp-form' ); ?>');">
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
