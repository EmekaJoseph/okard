        String firstName = "";
		int birthYear;
		int type;
		int salary;
		int bonus;
		int rate;
		int hoursWorked;
		int earnings;
		
		ArrayList<String> arrNames = new ArrayList<String>();
		ArrayList<Integer> arrBirthYears = new ArrayList<Integer>();
        ArrayList<String> arrSal = new ArrayList<String>();
		ArrayList<Integer> arrBonus = new ArrayList<Integer>();
		ArrayList<Integer> arrRate = new ArrayList<Integer>();
		ArrayList<Integer> arrHours = new ArrayList<Integer>();
        ArrayList<Integer> arrTypes = new ArrayList<Integer>();
		
		
		Scanner kbd = new Scanner (System.in);
		
		// creating variables and read from the keyboard
		
		System.out.println("Enter your First Name: ");
		firstName = kbd.next();
		
		// ***  Loop to input names and birth years and store them in an arraylist
		
		for (; !firstName.equals("9999");) {
			
			// if you get to this point it means that firstname is not 9999
			arrNames.add(firstName);
			
			
			System.out.println("Enter your year of birth: ");
			birthYear = kbd.nextInt();
			
			arrBirthYears.add(birthYear);
			
			System.out.println("Press 1 for FT , Press 2 for PT: ");
			type = kbd.nextInt();
			
			arrTypes.add(type);
			
			if (type == 1) {
				// employee is a FT
				System.out.println("Enter Salary: ");
				salary = kbd.nextInt();
				arrSal.add(salary);
				System.out.println("Enter Bonus: ");
				bonus = kbd.nextInt();
				arrBonus.add(bonus);
			} else if (type == 2) {
				// employee us a PT
				System.out.println("Enter Hours Worked: ");
				hoursWorked = kbd.nextInt();
				arrHours.add(hoursWorked);
				System.out.println("Enter rate: ");
				rate = kbd.nextInt();
				arrRate.add(rate);
						
			} else {
				// if none of the above
				System.out.println("Invalid Employee Type");				
			}

		
			System.out.println("Enter your First Name: ");
			firstName = kbd.next();
			
		} // end of for
		
		
		// ***  Loop to read names and birth years from the arraylist
		
		for (int i=0; i < arrNames.size() ;i++) {
			
			System.out.println("Hello " + arrNames.get(i));
			System.out.println("You were born in " + arrBirthYears.get(i));
			
			int age;
			age = 2023 - arrBirthYears.get(i);
			
			System.out.println("you are " + age + " years old");
			
			if (arrTypes.get(i) == 1) {
				// full time
				System.out.println("Type of employement: FULL TIME");
				System.out.println("Salary: " + arrSal.get(i));
				System.out.println("Bonus: " + arrBonus.get(i));
				earnings = arrSal.get(i) + arrBonus.get(i);
				System.out.println("Total Earnings: " + earnings);
			
				
			}
			
			if (arrTypes.get(i) == 2) {
				// part time
				System.out.println("Type of employement: PART TIME");
				System.out.println("Hours Worked: " + arrHours.get(i));
				System.out.println("Rate: " + arrRate.get(i));
				earnings = arrHours.get(i) * arrRate.get(i);
				System.out.println("Total Earnings: " + earnings);
				
			}
			
			System.out.println("-----------------");
			
			
		}
		
		System.out.println("The end");

        // 