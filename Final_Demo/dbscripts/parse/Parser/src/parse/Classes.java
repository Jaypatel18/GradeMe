package parse;

import java.io.File;
import java.util.ArrayList;

public class Classes{
			private int credits;
			private double grade;
			private int classid;
			private String letterGrade;
			private ArrayList<GradeCategory> cats;
			
			
			
			public Classes(){
				this.cats = new ArrayList<>();
			}

			public int calculateLetterGrade(){
				if(this.grade >= 90){
					this.letterGrade = "A";
					return 4;
				}else if(this.grade >= 80){
					this.letterGrade = "B";
					return 3;
				}else if(this.grade >= 70){
					this.letterGrade = "C";
					return 2;
				}else if(this.grade >= 60){
					this.letterGrade = "D";
					return 1;
				}else {
					this.letterGrade = "F";
					return 0;
				}
			}
			public void calculateGrade(){
				double grade = 0;
				for(GradeCategory gc : cats){
					gc.calculateAverageInCategory();
					double score = gc.getAvgPercent() * gc.getWeight();
					grade += score;
				}
				this.setGrade(grade);
			}

			public ArrayList<GradeCategory> getGradeCategories() {
				return cats;
			}




			public void setGradeCategories(ArrayList<GradeCategory> cats) {
				this.cats = cats;
			}




			public int getClassid() {
				return classid;
			}




			public void setClassid(int classid) {
				this.classid = classid;
			}


			public int getCredits() {
				return credits;
			}


			public void setCredits(int credits) {
				this.credits = credits;
			}


			public double getGrade() {
				return grade;
			}


			public void setGrade(double grade) {
				this.grade = grade;
			}
			
		}