--
-- Base de données : `nutritionbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories_ingrédients`
--

CREATE TABLE `categories_ingrédients` (
  `categorie_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etapes_preparation`
--

CREATE TABLE `etapes_preparation` (
  `etape_id` int(11) NOT NULL,
  `recette_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `calories_par_portion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `nutritionnistes`
--

CREATE TABLE `nutritionnistes` (
  `nutritionniste_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `spécialite` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `recette_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `instructions` text NOT NULL,
  `temps_preparation` int(11) DEFAULT NULL,
  `difficulte` varchar(50) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `createur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recettes_ingredients`
--

CREATE TABLE `recettes_ingredients` (
  `recette_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `nom_du_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivi_hebdomadaire`
--

CREATE TABLE `suivi_hebdomadaire` (
  `suivi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `semaine` date NOT NULL,
  `calories_consommees` int(11) DEFAULT NULL,
  `objectif_calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivi_journalier`
--

CREATE TABLE `suivi_journalier` (
  `suivi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `calories_consommees` int(11) DEFAULT NULL,
  `objectif_calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nutritionniste_id` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories_ingrédients`
--
ALTER TABLE `categories_ingrédients`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `etapes_preparation`
--
ALTER TABLE `etapes_preparation`
  ADD PRIMARY KEY (`etape_id`),
  ADD KEY `recette_id` (`recette_id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `nutritionnistes`
--
ALTER TABLE `nutritionnistes`
  ADD PRIMARY KEY (`nutritionniste_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`recette_id`),
  ADD KEY `createur_id` (`createur_id`);

--
-- Index pour la table `recettes_ingredients`
--
ALTER TABLE `recettes_ingredients`
  ADD KEY `recette_id` (`recette_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `suivi_hebdomadaire`
--
ALTER TABLE `suivi_hebdomadaire`
  ADD PRIMARY KEY (`suivi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `suivi_journalier`
--
ALTER TABLE `suivi_journalier`
  ADD PRIMARY KEY (`suivi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `nutritionniste_id` (`nutritionniste_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories_ingrédients`
--
ALTER TABLE `categories_ingrédients`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etapes_preparation`
--
ALTER TABLE `etapes_preparation`
  MODIFY `etape_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `nutritionnistes`
--
ALTER TABLE `nutritionnistes`
  MODIFY `nutritionniste_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `recette_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suivi_hebdomadaire`
--
ALTER TABLE `suivi_hebdomadaire`
  MODIFY `suivi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suivi_journalier`
--
ALTER TABLE `suivi_journalier`
  MODIFY `suivi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etapes_preparation`
--
ALTER TABLE `etapes_preparation`
  ADD CONSTRAINT `etapes_preparation_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`recette_id`);

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories_ingrédients` (`categorie_id`);

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`createur_id`) REFERENCES `utilisateurs` (`user_id`);

--
-- Contraintes pour la table `recettes_ingredients`
--
ALTER TABLE `recettes_ingredients`
  ADD CONSTRAINT `recettes_ingredients_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`recette_id`),
  ADD CONSTRAINT `recettes_ingredients_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`ingredient_id`);

--
-- Contraintes pour la table `suivi_hebdomadaire`
--
ALTER TABLE `suivi_hebdomadaire`
  ADD CONSTRAINT `suivi_hebdomadaire_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`user_id`);

--
-- Contraintes pour la table `suivi_journalier`
--
ALTER TABLE `suivi_journalier`
  ADD CONSTRAINT `suivi_journalier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`user_id`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `utilisateurs_ibfk_2` FOREIGN KEY (`nutritionniste_id`) REFERENCES `nutritionnistes` (`nutritionniste_id`);
COMMIT;
