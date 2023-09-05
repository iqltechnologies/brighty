
    <div class="wrap">
        <h2>Enable/Disable Brighty Modules</h2>
        <form method="post" action="options.php">
            <?php settings_fields('brighty_core_plugin_options'); ?>
            <?php do_settings_sections('brighty_core_plugin_options'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Clients</th>
                    <td>
                        <label>
                            <input type="checkbox" name="brighty_core_plugin_enabled_features[]" value="clients" <?php checked(in_array('clients', $this->enabled_features)); ?>>
                            Enable Clients
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Invoices</th>
                    <td>
                        <label>
                            <input type="checkbox" name="brighty_core_plugin_enabled_features[]" value="invoices" <?php checked(in_array('invoices', $this->enabled_features)); ?>>
                            Enable Invoices
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Domains</th>
                    <td>
                        <label>
                            <input type="checkbox" name="brighty_core_plugin_enabled_features[]" value="domains" <?php checked(in_array('domains', $this->enabled_features)); ?>>
                            Enable Domains 
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Hosting Accounts</th>
                    <td>
                        <label>
                            <input type="checkbox" name="brighty_core_plugin_enabled_features[]" value="hosting_accounts" <?php checked(in_array('hosting_accounts', $this->enabled_features)); ?>>
                            Enable Hosting Accounts
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Projects</th>
                    <td>
                        <label>
                            <input type="checkbox" name="brighty_core_plugin_enabled_features[]" value="projects" <?php checked(in_array('projects', $this->enabled_features)); ?>>
                            Enable Projects
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Leads</th>
                    <td>
                        <label>
                            <input type="checkbox" name="brighty_core_plugin_enabled_features[]" value="leads" <?php checked(in_array('leads', $this->enabled_features)); ?>>
                            Enable Leads
                        </label>
                    </td>
                </tr>
                <!-- Add more checkboxes for other core features as needed -->
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
  